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
    public function viewByUser($userId = null)
    {
        $quizManager = new QuizManager();
        $quizManager->setTable('quiz');

        if($userId){
            $quizzes = $quizManager->findByUserId($userId);
            var_dump($quizzes);
        }
        else{
            $this->redirectToRoute('quiz_view');
        }
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
}