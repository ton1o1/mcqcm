<?php

namespace Controller;

use \W\Controller\Controller;

class QuestionController extends Controller
{
	/**
	 * Question builder page
	 * 3 main parts in this function : test $_POST, insert question and choices, refill the inputs if the submit wasn't ok.
	 */
	public function questionBuild()
	{ 
		if($_POST){
			if(!empty($_POST['questionTitle'])){$questionTitle = $_POST['questionTitle'];}
			if(!empty($_POST['questionType'])){$questionType = $_POST['questionType'];}
			//choices values are stored in an array
			if(!empty($_POST['choice1'])){$choices[1] = $_POST['choice1'];}
			if(!empty($_POST['choice2'])){$choices[2] = $_POST['choice2'];}
			if(!empty($_POST['choice3'])){$choices[3] = $_POST['choice3'];}
			//answers that are true are also stored in an array
			if(!empty($_POST['solution1'])){$solutions[1] = true;}else{$solutions[1] = false;}
			if(!empty($_POST['solution2'])){$solutions[2] = true;}else{$solutions[2] = false;}
			if(!empty($_POST['solution3'])){$solutions[3] = true;}else{$solutions[3] = false;}
			//print_r($_POST);
		}
		    
		$errorMessages = [];

		if(empty($questionTitle)){
			$errorMessages['title'] = "L'intitulé de la question est vide.";
		}
		//test if at least one choice has been checked as a good solution
		if(empty($solutions[1]) && empty($solutions[2]) && empty($solutions[3])){
			$errorMessages['solution'] = "Il n'y a pas eu de bonne réponse choisie.";
		}
		//test if all choices have been written
		if (empty($choices[1])){
			$errorMessages['choice1'] = "Le choix 1 n'a pas été rédigé.";
		}
		if (empty($choices[2])){
			$errorMessages['choice2'] = "Le choix 2 n'a pas été rédigé.";
		}
		if (empty($choices[3])){
			$errorMessages['choice3'] = "Le choix 3 n'a pas été rédigé.";
		}		

		//init finalErrorMessage
		$finalErrorMessage = ""; 
		//no error messages means it's okay to insert data
		if(empty($errorMessages)){
		//insert question title in question table
			$questionManager = new \Manager\QuestionManager();
			$questionManager->setTable('question');
			if($_POST){
				$questionManager->insert([
					"quiz_id" => 1, //WARNING : value 1 is only temporary, how do we select the quiz id?
					"title" => $questionTitle,
				]);

		//insert choices in choices table
			//step 1 : select the last index of the question table
			$lastId = $questionManager->findLast();
			print_r($lastId) ;
			
			//step 2 : insert choice in choice table
			$questionManager = new \Manager\QuestionManager();
			$questionManager->setTable('choice');
			if($_POST){
				foreach ($choices as $k => $v) {
					$questionManager->insert([
						"question_id" => $lastId['id'],
						"title" => $v,
						"is_true" => $solutions[$k],
					]); 
					
				}
			}
			}

		} else {
			if ($_POST){
				foreach ($errorMessages as $key => $errorMessage) {
					$finalErrorMessage .= $errorMessage . "<br/>";
				}
				
			}
		}

		print_r($_POST);

		//the show method must always be at the end of the function that display because it contains a die() 
		$this->show('quiz/question_build', [
			"finalErrorMessage" => $finalErrorMessage,
			"dataPosted" => $_POST,
		]); //this is the route name, right? go check the documentation, and then the array is [index(isTheNameOfTheVariableInTheTemplate) => value="is the value"]
	}
}	
