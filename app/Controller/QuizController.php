<?php

namespace Controller;

use \W\Controller\Controller;
use Manager\QuizManager;
use Service\QuizValidator;

class QuizController extends Controller
{
    /**
     * List all quizzes or display one quiz by id, if given
     */
    public function view($quizId = null)
    {
        $quizManager = new QuizManager();

        if($quizId){
            $quizzes = $quizManager->findActive($quizId);
        }
        else{
            $orderBy = 'id';
            $orderDir = 'DESC'; //Display newer first
            $quizzes = $quizManager->findAllActive($orderBy, $orderDir);
        }

        var_dump($quizzes);
        // $this->show('quiz/view', ['quizzes' => $quizzes]);
    }

    /**
     * List all quizzes by user id
     */
    public function viewByUser($userId)
    {
        $quizManager = new QuizManager();

        $quizzes = $quizManager->findByUserId($userId);
        var_dump($quizzes);
    }

    /**
     * Quiz creator form
     */
    public function create()
    {
        // Dev mode START
        // $this->allowTo('user');
        // Dev mode END

        if($_POST){
            $validator = new QuizValidator();
            $validation = $validator->check($_POST);

            if($validation['success']){

                // Get user
                // Dev mode START
                // $loggedUser = $this->getUser();
                $loggedUser = ['id' => 1];
                // Dev mode END

                // Save new quiz in database
                $dateCreated = new \DateTime();

                $quizManager = new QuizManager();
                $quizManager->insert([
                    'user_id' => $loggedUser['id'],
                    'date_created' => $dateCreated->format('Y-m-d H:i:s'),
                    'title' => $_POST['title']
                ]);

                // Redirect to question creator page
                $this->redirectToRoute('question_build', ['message' => 'Quiz créé avec succès.']);
            }
            else{
                // Display form
                // with params : errors and data submitted
                $this->show('quiz/create', ['errors' => $validation['errors'], 'data' => $_POST]);
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

        $message = null;

        // Get user
        // Dev mode START
        // $loggedUser = $this->getUser();
        $loggedUser = ['id' => 1];
        // Dev mode END

        // Get quiz
        $quizManager = new QuizManager();
        $quiz = $quizManager->findActive($quizId);

        // Quiz exists ?
        if($quiz){
            
            // User is the owner ?
            if($loggedUser['id'] == $quiz['user_id']){

                // Confirmation has been sent ?
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    $validator = new QuizValidator();
                    $validation = $validator->check($_POST);

                    if($validation['success']){

                        // Update quiz in database
                        $quizManager->update(['title' => $_POST['title']], $quizId, true);

                        // Redirect to question creator page
                        $this->show('question_build');
                    }
                    else{
                        // Display form
                        // with params : errors and data submitted
                        $this->show('quiz/create', ['errors' => $validation['errors'], 'data' => $_POST]);
                    }
                }

                $this->show('quiz/delete', ['data' => $quiz, 'message' => $message]);

            } else $this->redirectToRoute('home', ['message' => 'Vous n\'avez pas les droits nécessaires pour supprimer ce quiz.']);

        } else $this->redirectToRoute('home', ['message' => 'Quiz non trouvé.']);
    }

    /**
     * Quiz destructor
     */
    public function delete($quizId)
    {
        // Dev mode START
        // $this->allowTo('user');
        // Dev mode END

        $message = null;

        // Get user
        // Dev mode START
        // $loggedUser = $this->getUser();
        $loggedUser = ['id' => 1];
        // Dev mode END

        // Get quiz
        $quizManager = new QuizManager();
        $quiz = $quizManager->findActive($quizId);

        // Quiz exists ?
        if($quiz){
            
            // User is the owner ?
            if($loggedUser['id'] == $quiz['user_id']){

                // Confirmation has been sent ?
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    // Is he sure wants to delete ?
                    if(!empty($_POST['sure']) && $_POST['sure'] == 1){

                        $quizManager->update(['is_active' => false], $quizId, true);

                        $this->redirectToRoute('home', ['message' => 'Le quiz a bien été supprimé.']);

                    } else $message = 'Veuillez confirmer la suppression en cochant la case.';
                }

                $this->show('quiz/delete', ['data' => $quiz, 'message' => $message]);

            } else $this->redirectToRoute('home', ['message' => 'Vous n\'avez pas les droits nécessaires pour supprimer ce quiz.']);

        } else $this->redirectToRoute('home', ['message' => 'Quiz non trouvé.']);
    }
}