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
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		//POST variables declaration
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
		    
		//after submission, I won't test every single input because I'm fucking lazy
		$errorMessage = [];
		//fine, I'll test them, TEST of all post variables 

		if(empty($questionTitle)){
			$errorMessage['title'] = "L'intitulé de la question est vide.";
		}
		//test if at least one choice has been checked as a good answer
		if(empty($answer1) && empty($answer2) && empty($answer3)){
			$errorMessage['answer'] = "Il n'y a pas de bonne réponse choisie.";
		}
		//test if all choices have been written
		if (empty($choice1)){
			$errorMessage['answer'] = "Le choix 1 n'a pas été rédigé.";
		}
		if (empty($choice2)){
			$errorMessage['answer'] = "Le choix 2 n'a pas été rédigé.";
		}
		if (empty($choice3)){
			$errorMessage['answer'] = "Le choix 3 n'a pas été rédigé.";
		}		
		$this->show('quiz/question_build', ["errorMessage" => $errorMessage]); //this is the route name, right? go check the documentation, and then the array is [index(isTheNameOfTheVariableInTheTemplate) => value="is the value"]

		echo "<pre>";
		print_r($errorMessage);
		echo "</pre>";	
	}






}








