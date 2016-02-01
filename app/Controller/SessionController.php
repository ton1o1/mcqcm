<?php

namespace Controller;

use \W\Controller\Controller;

class SessionController extends Controller
{
    private $alerts;
    private $sessionManager;
    // private $answerManager;

    public function __construct()
    {
        $this->alerts = new \Service\Alerts();
        $this->sessionManager = new \Manager\SessionManager();
        // $this->answerManager = new \Manager\AnswerManager();
    }

    /**
     * Dynamic session interface to play a quiz by id
     */
    public function play($quizId)
    {
        // Dev mode START
        // $this->allowTo('user');
        // Dev mode END

        // Get user
        // Dev mode START
        // $loggedUser = $this->getUser();
        $loggedUser = ['id' => 1];
        // Dev mode END

        // If no quiz is played currently
        if(empty($_SESSION['play'])){
            
            // Create new session

            // Get date start
            $dateStart = new \DateTime();

            $this->sessionManager->insert([
                'user_id' => $loggedUser['id'],
                'quiz_id' => $quizId,
                'date_start' => $dateStart->format('Y-m-d H:i:s'),
                'date_stop' => null,
                'score' => 0
            ]);

            $_SESSION['play'] = ['sessionId' => $this->sessionManager->lastId(), 'quizId' => $quizId];
        }

        // Get questions
        $questions = $this->questionManager->findByQuizId($_SESSION['play']['quizId']);

        $this->show('session/play', ['currentSession' => $currentSession]);
    }

    /**
     * Save answers during session
     */
    public function save($sessionId)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        }
        else{
            $this->redirectToRoute('home');
        }
    }

    /**
     * Save answers and close session
     */
    public function close($sessionId)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        }
        else{
            $this->redirectToRoute('home');
        }
    }
}