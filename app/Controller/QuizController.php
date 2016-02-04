<?php

namespace Controller;

use \W\Controller\Controller;
use Cocur\Slugify\Slugify;

class QuizController extends Controller
{
    private $alerts;
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->alerts = new \Service\Alerts();
        $this->manager = new \Manager\QuizManager();
        $this->skillManager = new \Manager\SkillManager();
        $this->quizskillManager = new \Manager\QuizskillManager();
        $this->validator = new \Service\Validator\Quiz();
    }

    /**
     * Search quizzes by skills
     */
    public function search()
    {
        $quizzes = null;
        $total = null;
        $tags = [];

        if(!empty($_GET['tags'])){

            foreach($_GET['tags'] as $tag){
                $tag = explode('|', $tag);
                $tags[] = $tag[0];
            }

            $page = 1;

            if(!empty($_GET['page'])){
            
                $pageInt = (int) $_GET['page'];

                if($pageInt > 1){
                    $page = $pageInt;
                }
            }

            $slugify = new Slugify();

            $total = $this->manager->totalByTags($tags);
            $quizzes = $this->manager->findByTags($tags, $page);

            if($quizzes){
                foreach($quizzes as $key => $value){
                    $slug = $slugify->slugify($value['title']);
                    $quizzes[$key]['title'] = [$slug, $value['title']];
                }
            }
        
        }

        $this->show('default/home', ['quizzes' => $quizzes, 'total' => $total['COUNT(q.id)']]);
    }

    /**
     * List all quizzes or display one quiz by id, if given
     */
    public function view($quizId = null, $quizSlug = null)
    {
        if($quizId && $quizSlug){
            $quiz = $this->manager->findActive($quizId);

            if(!$quiz || $quiz['slug'] != $quizSlug){
                $this->showNotFound();
            }

            $this->show('quiz/view', ['quiz' => $quiz]);
        }

        $orderBy = 'id';
        $orderDir = 'DESC'; //Display newer first
        $quizzes = $this->manager->findAllActive($orderBy, $orderDir);

        if($quizzes){
            $slugify = new Slugify();

            foreach($quizzes as $key => $value){
                $slug = $slugify->slugify($value['title']);
                $quizzes[$key]['title'] = [$slug, $value['title']];
            }
        }

        $this->show('quiz/view_all', ['quizzes' => $quizzes]);
    }

    /**
     * List all quizzes by user id
     */
    public function viewByUser()
    {
        $this->allowTo('student');

        // Get user
        $loggedUser = $this->getUser();

        $quizzes = $this->manager->findByUserId($loggedUser['id']);
        
        if($quizzes){
            $slugify = new Slugify();

            foreach($quizzes as $key => $value){
                $slug = $slugify->slugify($value['title']);
                $quizzes[$key]['title'] = [$slug, $value['title']];
            }
        }

        $this->show('quiz/view_user', ['quizzes' => $quizzes]);
    }

    /**
     * Quiz creator form
     */
    public function create()
    {
        $this->allowTo('student');

        // If form submitted
        if(!empty($_POST['quiz']['submit'])){

            $validation = $this->validator->check($_POST['quiz']);

            if($validation['success']){

                $slugify = new Slugify();

                // Get user
                $loggedUser = $this->getUser();

                // Save new quiz in database

                // Get date now
                $dateCreated = new \DateTime();

                $this->manager->insert([
                    'creator_id' => $loggedUser['id'],
                    'date_created' => $dateCreated->format('Y-m-d H:i:s'),
                    'title' => $_POST['quiz']['title'],
                    'description' => $_POST['quiz']['description'],
                    'slug' => $slugify->slugify($_POST['quiz']['title']),
                    'is_active' => true
                ]);

                $lastQuizId = $this->manager->lastId();

                $skills = [];

                foreach($_POST['quiz']['skills'] as $skill){
                    $skill = explode('|', $skill);
                    $skills[] = $skill[0];
                }

                foreach($skills as $skill){

                    $skillInt = (int) $skill;

                    if($skillInt > 0){
                        // Tag skill existing
                        
                        $this->quizskillManager->insert([
                            'quiz_id' => $lastQuizId,
                            'skill_id' => $skillInt,
                        ]);
                    }
                    else{
                        // New tag skill

                        $this->skillManager->insert([
                            'tag' => $skill,
                        ]);
                        $lastSkillId = $this->skillManager->lastId();

                        $this->quizskillManager->insert([
                            'quiz_id' => $lastQuizId,
                            'skill_id' => $lastSkillId,
                        ]);
                    }
                }

                // Flash message
                // $this->alerts->add(['type' => 'success', 'content' => 'Quiz créé avec succès.']);

                $this->redirectToRoute('question_build', [
                    'quizId' => $lastQuizId,
                ]);
            }
            else{
                // Flash message
                $this->alerts->add(['type' => 'danger', 'content' => 'Le formulaire contient des erreurs !']);

                // Display form
                // with params : errors and data submitted
                $this->show('quiz/create', ['errors' => $validation['errors'], 'data' => $_POST['quiz'], 'alerts' => $this->alerts->getAll()]);
            }
        }
        else{
            // Display form
            $this->show('quiz/create');
        }
    }

    /**
     * Quiz editor form
     */
    public function edit($quizId)
    {
        $this->allowTo('student');

        // Get user
        $loggedUser = $this->getUser();

        // Get quiz
        $quiz = $this->manager->findActive($quizId);

        // Quiz exists ?
        if($quiz){
            
            // User is the owner ?
            if($loggedUser['id'] == $quiz['creator_id']){

                // If form submitted
                if(!empty($_POST['quiz']['submit'])){

                    $validation = $this->validator->check($_POST['quiz']);

                    if($validation['success']){

                        $slugify = new Slugify();

                        // Get date now
                        $dateUpdated = new \DateTime();

                        $this->manager->update([
                            'date_updated' => $dateUpdated->format('Y-m-d H:i:s'),
                            'title' => $_POST['quiz']['title'],
                            'description' => $_POST['quiz']['description'],
                            'slug' => $slugify->slugify($_POST['quiz']['title']),
                        ], $quizId, true);

                        // Flash message
                        $this->alerts->add(['type' => 'success', 'content' => 'Quiz modifié avec succès.']);
                        
                        // Display form
                        $this->show('quiz/edit', ['quiz' => $quiz, 'data' => $_POST['quiz'], 'alerts' => $this->alerts->getAll()]);
                    }
                    else{
                        // Flash message
                        $this->alerts->add(['type' => 'danger', 'content' => 'Le formulaire contient des erreurs !']);

                        // Display form
                        // with params : errors and data submitted
                        $this->show('quiz/edit', ['quiz' => $quiz, 'errors' => $validation['errors'], 'data' => $_POST['quiz'], 'alerts' => $this->alerts->getAll()]);
                    }
                }
                else{
                    // Display form
                    $this->show('quiz/edit', ['quiz' => $quiz]);
                }
            }
            else {
                $this->alerts->add(['type' => 'danger', 'content' => 'Vous n\'avez pas les droits nécessaires pour modifier ce quiz.']);
                $this->redirectToRoute('home', ['alerts' => $this->alerts->getAll()]);
            }
        }
        else{
            $this->alerts->add(['type' => 'danger', 'content' => 'Quiz non trouvé.']);
            $this->redirectToRoute('home', ['alerts' => $this->alerts->getAll()]);
        }
    }

    /**
     * Quiz destructor
     */
    public function delete($quizId)
    {
        $this->allowTo('student');

        // Get user
        $loggedUser = $this->getUser();

        // Get quiz
        $quiz = $this->manager->findActive($quizId);

        // Quiz exists ?
        if($quiz){
            
            // User is the owner ?
            if($loggedUser['id'] == $quiz['creator_id']){

                // Confirmation has been sent ?
                if(!empty($_POST['quiz']['submit'])){

                    // Is he sure wants to delete ?
                    if(!empty($_POST['sure']) && $_POST['sure'] == 1){

                        $this->manager->update(['is_active' => false], $quizId, true);

                        // Flash message
                        $this->alerts->add(['type' => 'success', 'content' => 'Le quiz a bien été supprimé.']);

                        // Redirect to homepage
                        $this->redirectToRoute('home', ['alerts' => $this->alerts->getAll()]);

                    }
                    else {
                        $this->alerts->add(['type' => 'danger', 'content' => 'Veuillez confirmer la suppression en cochant la case.']);
                    }
                }

                $this->show('quiz/delete', ['quiz' => $quiz, 'alerts' => $this->alerts->getAll()]);

            }
            else {
                $this->alerts->add(['type' => 'danger', 'content' => 'Vous n\'avez pas les droits nécessaires pour modifier ce quiz.']);
                $this->redirectToRoute('home', ['alerts' => $this->alerts->getAll()]);
            }
        }
        else{
            $this->alerts->add(['type' => 'danger', 'content' => 'Quiz non trouvé.']);
            $this->redirectToRoute('home', ['alerts' => $this->alerts->getAll()]);
        }
    }
}