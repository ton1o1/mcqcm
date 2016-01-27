<?php

namespace Controller;

use \W\Controller\Controller;

class SessionController extends Controller
{
    private $alerts;
    private $sessionManager;
    private $answerManager;

    public function __construct()
    {
        $this->alerts = new \Service\Alerts();
        $this->sessionManager = new \Manager\SessionManager();
        $this->answerManager = new \Manager\AnswerManager();
    }

    /**
     * Dynamic session interface to play a quiz by id
     */
    public function play($quizId)
    {
        
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