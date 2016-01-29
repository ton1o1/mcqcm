<?php

namespace Controller;

use \W\Controller\Controller;

class QuizController extends Controller
{
    private $alerts;
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->alerts = new \Service\Alerts();
        $this->manager = new \Manager\QuizManager();
        $this->validator = new \Service\Validator\Quiz();
    }

    /**
     * Search quizzes by skills
     */
    public function search()
    {
        
    }

    /**
     * List all quizzes or display one quiz by id, if given
     */
    public function view($quizId = null)
    {
        if($quizId){
            $quizzes = $this->manager->findActive($quizId);

            if(!$quizzes){
                $this->showNotFound();
            }
        }
        else{
            $orderBy = 'id';
            $orderDir = 'DESC'; //Display newer first
            $quizzes = $this->manager->findAllActive($orderBy, $orderDir);
        }

        if(!$quizzes){
            echo 'Aucun quiz trouvé.';
        }
        else{
            var_dump($quizzes);
        }
        // $this->show('quiz/view', ['quizzes' => $quizzes]);
    }

    /**
     * List all quizzes by user id
     */
    // public function viewByUser($userId)
    // {
    //     $quizzes = $this->manager->findByUserId($userId);
        
    //     if(!$quizzes){
    //         echo 'Cet utilisateur n\'a créé aucun quiz.';
    //     }
    //     else{
    //         var_dump($quizzes);
    //     }
    // }

    /**
     * Quiz creator form
     */
    public function create()
    {
        // Dev mode START
        // $this->allowTo('user');
        // Dev mode END

        // If form submitted
        if(!empty($_POST['quiz']['submit'])){

            $validation = $this->validator->check($_POST['quiz']);

            if($validation['success']){

                // Get user
                // Dev mode START
                // $loggedUser = $this->getUser();
                $loggedUser = ['id' => 1];
                // Dev mode END

                // Save new quiz in database

                $dateCreated = new \DateTime();
                $skills = []; // à faire

                $this->manager->insert([
                    'user_id' => $loggedUser['id'],
                    'date_created' => $dateCreated->format('Y-m-d H:i:s'),
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'skills_id' => serialize($skills),
                    'is_active' => true
                ]);

                // Flash message
                $this->alerts->add(['type' => 'success', 'content' => 'Quiz créé avec succès.']);

                // Redirect to question creator page
                $this->redirectToRoute('question_create', ['quizId' => $this->manager->lastId(), 'alerts' => $this->alerts->getAll()]);
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
        // Dev mode START
        // $this->allowTo('user');
        // Dev mode END

        // Get user
        // Dev mode START
        // $loggedUser = $this->getUser();
        $loggedUser = ['id' => 1];
        // Dev mode END

        // Get quiz
        $quiz = $this->manager->findActive($quizId);

        // Quiz exists ?
        if($quiz){
            
            // User is the owner ?
            if($loggedUser['id'] == $quiz['user_id']){

                // If form submitted
                if(!empty($_POST['quiz'])){

                    $validation = $this->validator->check($_POST['quiz']);

                    if($validation['success']){

                        // Update quiz in database
                        $this->manager->update(['title' => $_POST['title']], $quizId, true);

                        // Flash message
                        $this->alerts->add(['type' => 'success', 'content' => 'Quiz modifié avec succès.']);

                        // Display form
                        $this->show('quiz/edit', ['quiz' => $quiz, 'alerts' => $this->alerts->getAll()]);
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
        // Dev mode START
        // $this->allowTo('user');
        // Dev mode END

        // Get user
        // Dev mode START
        // $loggedUser = $this->getUser();
        $loggedUser = ['id' => 1];
        // Dev mode END

        // Get quiz
        $quiz = $this->manager->findActive($quizId);

        // Quiz exists ?
        if($quiz){
            
            // User is the owner ?
            if($loggedUser['id'] == $quiz['user_id']){

                // Confirmation has been sent ?
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

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

                $this->show('quiz/delete', ['data' => $quiz, 'alerts' => $this->alerts->getAll()]);

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