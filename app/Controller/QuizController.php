<?php

namespace Controller;

use \W\Controller\Controller;
use Manager\QuizManager;
use Service\QuizValidator;

class QuizController extends Controller
{
    /**
     * List all the quizzes or display one quiz by id if given
     */
    public function view($quizId = null)
    {
        $quizManager = new QuizManager();

        // Our table names are not plural, so we set a custom table name
        $quizManager->setTable('quiz');

        if($quizId){
            $quizzes = $quizManager->find($quizId);
        }
        else{
            $orderBy = 'id';
            $orderDir = 'DESC'; //Display newer first
            $quizzes = $quizManager->findAll($orderBy, $orderDir);
        }

        var_dump($quizzes);
        // $this->show('quiz/view', ['quizzes' => $quizzes]);
    }

    /**
     * List all the quizzes by user id
     */
    public function viewByUser($userId)
    {
        $quizManager = new QuizManager();
        $quizManager->setTable('quiz');

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
                $quizManager->setTable('quiz');
                $quizManager->insert([
                    'user_id' => $loggedUser['id'],
                    'date_created' => $dateCreated->format('Y-m-d H:i:s'),
                    'title' => $_POST['title']
                ]);

                // Redirect to question creator page
                $this->show('question_build');
            }
            else{
                // Display the form
                // We set in params errors and data submitted
                $this->show('quiz/create', ['errors' => $validation['errors'], 'data' => $_POST]);
            }
        }
        else{
            // Display the form
            $this->show('quiz/create');
        }
    }

    /**
     * Quiz edit form
     */
    public function edit()
    {

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
        $quizManager = new QuizManager();
        $quizManager->setTable('quiz');
        $quiz = $quizManager->find($quizId);

        // User is the owner ?
        if($loggedUser['id'] === $quiz['user_id']){

            // Confirmation has been sent ?
            if($_POST){

                // Is he sure want to delete ?
                if($_POST['sure'] == 1){
                    $quizManager->delete($quizId);

                    $this->show('quiz/delete', ['messages' => 'Le quiz a bien été supprimé.']);

                } else $this->show('quiz/delete', ['messages' => 'Veuillez confirmer la suppression en cochant la case.']);
                
            } else $this->show('quiz/delete');

        } else $this->show('quiz/delete', ['messages' => 'Vous n\'avez pas les droits nécessaires pour supprimer ce quiz.']);
    }
}