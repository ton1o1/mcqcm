<?php

namespace Controller;

use \W\Controller\Controller;

class SessionController extends Controller
{
    private $alerts;
    private $manager;

    public function __construct()
    {
        $this->alerts = new \Service\Alerts();
        $this->manager = new \Manager\SessionManager();
    }

    /**
     * Dynamic session interface to play a quiz by id
     */
    public function play($quizId)
    {
        $this->allowTo('student');
        
        // Get user
        $loggedUser = $this->getUser();

        // If no quiz is played currently
        if(empty($_SESSION['play'])){
            
            // Create new session

            // Get date start
            $dateStart = new \DateTime();

            $this->manager->insert([
                'user_id' => $loggedUser['id'],
                'quiz_id' => $quizId,
                'date_start' => $dateStart->format('Y-m-d H:i:s'),
                'date_stop' => null,
                'score' => 0
            ]);

            $_SESSION['play'] = ['sessionId' => $this->manager->lastId(), 'dateStart' => $dateStart->format('Y-m-d H:i:s'), 'quizId' => $quizId];
        }

        // Get questions
        $questions = $this->manager->questionsByQuizId($_SESSION['play']['quizId']);

        $play = ['sessionId' => $_SESSION['play']['sessionId'], 'dateStart' => $_SESSION['play']['dateStart'], 'quizTitle' => $questions[0]['quizTitle'], 'questions' => [] ];

        foreach($questions as $question){

            $choices = [];
            $solutionsCount = 0;

            // Get choices
            $choicesList = $this->manager->choicesByQuestionId($question['questionId']);

            foreach($choicesList as $choice){
                $choices[] = ['id' => $choice['choiceId'], 'title' => $choice['choiceTitle']];
                if($choice['isTrue']){
                    $solutionsCount++;
                }
            }

            $play['questions'][] = ['id' => $question['questionId'], 'title' => $question['questionTitle'], 'choices' => $choices, 'solutionsCount' => $solutionsCount];

        }

        $this->show('session/play', ['play' => $play]);
    }

    /**
     * Save answers during session
     */
    public function save()
    {
        // For V2.0
    }

    /**
     * Save answers and close session
     */
    public function close()
    {
        $this->allowTo('student');

        // Do we have a session to close ?
        if(!empty($_SESSION['play']['sessionId'])){

            // Check if session is active
            $active = $this->manager->findActive($_SESSION['play']['sessionId']);

            if($active){

                // Get user
                $loggedUser = $this->getUser();

                // Get session id
                $sessionId = $_SESSION['play']['sessionId'];

                // Save answers
                if(!empty($_POST)){
                    foreach($_POST as $questionId => $choicesId){
                        $this->manager->setTable("answers");
                        $this->manager->insert([
                            'session_id' => $sessionId,
                            'user_id' => $loggedUser['id'],
                            'question_id' => $questionId,
                            'choices' => serialize($choicesId)
                        ]);
                    }
                }

                // Close session
                
                // Get date
                $dateStop = new \DateTime();

                $this->manager->setTable("sessions");
                $this->manager->update([
                    'date_stop' => $dateStop->format('Y-m-d H:i:s'),
                ], $sessionId, true);
            }

            // Destroy session
            unset($_SESSION['play']);
        }

        // Redirect to result page
        // $this->redirectToRoute('result_view_session', ['userId' => $loggedUser['id'], 'sessionId' => $sessionId]);
    }
}