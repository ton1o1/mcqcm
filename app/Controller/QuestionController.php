<?php

namespace Controller;

use \W\Controller\Controller;

class QuestionController extends Controller
{
	/**
	 * Question builder page 
	 */
	public function questionBuild()
	{ 

		if($_POST){
			if(!empty($_POST['questionTitle'])){$questionTitle = $_POST['questionTitle'];}
			if(!empty($_POST['questionType'])){$questionType = $_POST['questionType'];}
			if(!empty($_POST['answer1'])){$answer1 = $_POST['answer1'];}
			if(!empty($_POST['choice1'])){$choice1 = $_POST['choice1'];}
			if(!empty($_POST['answer2'])){$answer2 = $_POST['answer2'];}
			if(!empty($_POST['choice2'])){$choice2 = $_POST['choice2'];}
			if(!empty($_POST['answer3'])){$answer3 = $_POST['answer3'];}
			if(!empty($_POST['choice3'])){$choice3 = $_POST['choice3'];}
		}
		    
		$errorMessages = [];

		if(empty($questionTitle)){
			$errorMessages['title'] = "L'intitulé de la question est vide.";
		}
		//test if at least one choice has been checked as a good answer
		if(empty($answer1) && empty($answer2) && empty($answer3)){
			$errorMessages['answer'] = "Il n'y a pas de bonne réponse choisie.";
		}
		//test if all choices have been written
		if (empty($choice1)){
			$errorMessages['choice1'] = "Le choix 1 n'a pas été rédigé.";
		}
		if (empty($choice2)){
			$errorMessages['choice2'] = "Le choix 2 n'a pas été rédigé.";
		}
		if (empty($choice3)){
			$errorMessages['choice3'] = "Le choix 3 n'a pas été rédigé.";
		}		

		//Instance QuestionManager to insert the question in db
		$questionManager = new \Manager\QuestionManager;

		//si c'est valide
		$finalErrorMessage = ""; 
		if(empty($errorMessages)){
			//insert question title in question table
			$questionManager = new \Manager\QuestionManager();
			$questionManager->setTable('question');
			if($_POST){
				$questionManager->insert([
					"quiz_id" => 1, //WARNING : value 1 is only for tests
					"title" => $questionTitle,
				]);
			//insert answers title in question table
			$lastId = $questionManager->findLast();
			//step 1 : select the last index of the question table

			print_r($foo);
			//step 2 : insert choice in choice table
			}

			$questionManager->setTable('choice');
			if($_POST){
				$questionManager->insert([
					"question_id" => $lastId,
					"title" => $questionTitle,
					"is_true" => $questionTitle,
				]); 
				//id, question_id, title, is_true

			$answer1
			$choice1
			$answer2
			$choice2
			$answer3
			$choice3


			// $questionManager = new \Manager\QuestionManager();
			// $questionManager->setTable('question');
			// if($_POST){
				// $questionManager->insert([
					// "quiz_id" => 1,
					// "title" => $questionTitle,
				// ]);
			// }




		} else {
			foreach ($errorMessages as $key => $errorMessage) {
				$finalErrorMessage .= $errorMessage . "<br/>";
			}
		}
		foreach ($errorMessages as $key => $errorMessage) {
			$finalErrorMessage .= $errorMessage . "<br/>";
		}
		//the show method must always be at the end of the function that display because it contains a die() 
		$this->show('quiz/question_build', [
			"finalErrorMessage" => $finalErrorMessage 
		]); //this is the route name, right? go check the documentation, and then the array is [index(isTheNameOfTheVariableInTheTemplate) => value="is the value"]



	}
}


//line 55 to 59 : what is the purpose of the test of $_POST





