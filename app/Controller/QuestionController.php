<?php

namespace Controller;

use \W\Controller\Controller;

class QuestionController extends Controller
{
	// QUESTION BUILD
	/**
	 * Question builder page
	 * 3 main parts in this function : test $_POST, insert question and choices, refill the inputs if the submit wasn't ok.
	 */
	public function questionBuild()
	{ 

		//If $_POST exists, test the keys one by one
		if($_POST){

			if(!empty($_POST['questionTitle']))
			{
				$questionTitle = $_POST['questionTitle'];
			} else 
			{
				$errorMsg['title'] = "Veuillez saisir un intitulé de question.";
			}

			//***choices values are stored in an array
			if(!empty($_POST['choice1'])){
				$choices[1] = $_POST['choice1'];
			} else 
			{
				$errorMsg['choice1'] = "Veuillez saisir le champ 1.";
			}

			if(!empty($_POST['choice2'])){
				$choices[2] = $_POST['choice2'];
			} else 
			{
				$errorMsg['choice2'] = "Veuillez saisir le champ 2.";
			}

			if(!empty($_POST['choice3'])){
				$choices[3] = $_POST['choice3'];
			} else 
			{
				$errorMsg['choice3'] = "Veuillez saisir le champ 3.";
			}

			if(!empty($_POST['choice4'])){
				$choices[4] = $_POST['choice4'];
			} else 
			{
				$errorMsg['choice4'] = "Veuillez saisir le champ 4.";
			}

			//debug($_POST);
			//answers that are true are also stored in an array, 
			if(!empty($_POST['solution1'])){
				$solutions[1] = "checked";
			} else
			{
				$solutions[1] = false;
			}
			if(!empty($_POST['solution2'])){
				$solutions[2] = "checked";
			} else
			{
				$solutions[2] = false;
			}
			if(!empty($_POST['solution3'])){
				$solutions[3] = "checked";
			} else
			{
				$solutions[3] = false;
			}
			if(!empty($_POST['solution4'])){
				$solutions[4] = "checked";
			} else
			{
				$solutions[4] = false;
			}

			if(empty($_POST['solution1']) && empty($_POST['solution2']) && empty($_POST['solution3']) && empty($_POST['solution4'])){
				$errorMsg['solution'] = "Veuillez choisir au moins une bonne réponse.";
			}

			if(empty($errorMsg))
			{
				$questionManager = new \Manager\QuestionManager();
				//insert question title in question table
				$questionManager->insert([
					//this value will came from $_SESSION['user']['id']
					"creator_id" => 1, 
					"title" => $questionTitle,
				]);
		
				//insert choices in choices table
				//step 1 : select the last index of the question table
				$lastId = $questionManager->lastId(); //needs to work with guillaume
				
				//step 2 : insert choice in choice table
				$choiceManager = new \Manager\ChoiceManager();
				//$questionManager->setTable('choices');
				if($_POST){
					foreach ($choices as $k => $v) {
						$choiceManager->insert([
							"question_id" => $lastId,
							"title" => $v,
							"is_true" => $solutions[$k] && true,
							"is_active" => 1,

						]); 
					}
				}
				//enable to reset inputs if the insert succeeds
				unset($_POST);
				//init success msg
				$_POST["success"] = "Votre question vient d'être ajoutée à la base.";
			}

		}
		//enable not to have warning with errorMsg echoes  
		if(!isset($errorMsg))
		{
			$errorMsg=NULL;
		}

		$this->show('question/question_build', [
			"errorMsg" => $errorMsg,
			"written" => $_POST,
		]);
	}

	//END QUESTION BUILD
	
	/**
	 * List of all the questions in order to have a global view
	 * 
	 */
	public function questionList($orderBy = "id", $orderDir = "ASC")
	{

		$questionManager = new \Manager\QuestionManager();
		$questionManager->setTable('questions');
		//
		$listQuestions = $questionManager->findAll($orderBy, $orderDir);
		//When AJAX ready, add a third column with a link to quiz if it exists
		$rows = "";

		foreach ($listQuestions as $k => $v) {
			$rows .= "<tr>
						<td>" .
							$v['id'] .
						"</td>
						<td>
							<a href='question/" . $v['id'] . "'>" . $v['title'] . "</a>  
						</td> 
					</tr>";
		}

		$this->show('question/question_list', ["rows" => $rows]);		
	}
	
	/**
	 * Display the content of a question with its choices
	 */
	public function questionConsult($questionId){
		//init Manager
		$questionManager = new \Manager\QuestionManager();
		//get question info
		$question = $questionManager->find($questionId);

		//get choices info
		if($question){
			$choiceManager = new \Manager\ChoiceManager();
			$questionId = $question["id"];	
	
			$choices = $choiceManager->findChoiceByQuestionId($questionId);
			//allow to display checked/unchecked boxes or radios
			$count = 0;
			for ($i = 0, $count; $i < 4; $i++) {
				if ($choices[$i]['is_true']){
					$choices[$i]['is_true'] = "checked";
					$count++;
				}
				if ($count > 1){
					$question['type'] = "checkbox";
				} else {
					$question['type'] = "radio";
				}
			}
			//get quiz info
			$Quizs__questionManager = new \Manager\Quizs__questionManager();
			$Quizs__questionManager->setTable("quizs__questions");	
			$quizInfo = $Quizs__questionManager->findQuizIdBy($questionId);
			//debug($quizInfo);
	
			$this->show('question/question_consult', [
				"question" => $question,
				"choices" => $choices,
				"quizInfo" => $quizInfo,
			]);
		} else
		{
			//show notfound page
			$this->show('question/question_not_found', [
				"questionId" => $questionId,
			]);
		}
	}

	/**
	 * For AJAX
	 * Select the first 5 results of a title search among questions
	 */

	public function questionSearch(){
		$questionManager = new \Manager\QuestionManager();

		//search a Question by a string
		$array = $questionManager->searchQuestion($_GET["input"]);
		$this->showJson($array);
	}

	public function ajaxAddQuestion(){

		print_r($_POST);
		$Quizs__questionManager = new \Manager\Quizs__questionManager();
		$Quizs__questionManager->insert([
			"id" => NULL,
			"quiz_id" => 1,
			"question_id" => 23,
			"is_active" => 1
		]);

	} 


}








