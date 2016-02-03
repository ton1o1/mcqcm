<?php

namespace Controller;

use \W\Controller\Controller;

class QuestionController extends Controller
{

	/**
	 * Question builder page
	 * 3 main parts in this function : test $_POST, insert question and choices, refill the inputs if the submit wasn't ok.
	 */

/****************************************
	CREATE AND ADD A NEW QUESTION TO A QUIZ
****************************************/


	public function questionBuild($quizId)
	{ 
		session_start();
		// If $_POST exists, test the keys one by one
		if($_POST){

			if(!empty($_POST['questionTitle']))
			{
				$questionTitle = $_POST['questionTitle'];
			} else 
			{
				$errorMsg['title'] = "Veuillez saisir un intitulé de question.";
			}

			//choices values are stored in an array
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
			//true choices named solutions are also stored in an array, 
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
			//init message if none of the checkbox has been checked
			if(empty($_POST['solution1']) && empty($_POST['solution2']) && empty($_POST['solution3']) && empty($_POST['solution4'])){
				$errorMsg['solution'] = "Veuillez choisir au moins une bonne réponse.";
			}

			//if all the inputs are okay, question and choices insertion happen
			if(empty($errorMsg))
			{
				$questionManager = new \Manager\QuestionManager();
				//insert question title in question table
				$questionManager->insert([
					//this value will came from $_SESSION['user']['id']
					"creator_id" => $_SESSION['user']['id'], 
					"title" => $questionTitle,
				]);
				
				//debug($_POST); debug(get_defined_vars());debug($_COOKIE);debug($_SESSION);

				//select the last index of the question table
				$lastId = $questionManager->lastId();

				//insert the relation between the quiz and the question
				$quizs_questionManager = new \Manager\Quizs__questionManager();
				if($_POST){
					$quizs_questionManager->insert([
						"quiz_id" => $quizId,	
						"question_id" => $lastId,
						"is_active" => 1,
					]);
				}
				
				//insert choice in choice table
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
			
				//enable to reset inputs if the insertion succeeds
				unset($_POST);
				//init success msg
				$_POST["success"] = "Votre question vient d'être ajoutée à la base.";
			}

		}
		//prevent from having error message with echo if there's no $errorMsg  
		if(!isset($errorMsg))
		{
			$errorMsg=NULL;
		}

		//display template
		$this->show('question/question_build', [
			"errorMsg" => $errorMsg,
			"written" => $_POST,
			"quizId" => $quizId,

		]);
	}

/****************************************
	LIST ALL THE QUESTIONS
****************************************/
	
	/**
	 * List of all the questions in order to have a global view
	 * 
	 */
	public function questionList($orderBy = "id", $orderDir = "ASC")
	{

		$questionManager = new \Manager\QuestionManager();

		$questionManager->setTable('questions');
		$listQuestions = $questionManager->findAll($orderBy, $orderDir);
		//When AJAX ready, add a third column with a link to quiz if it exists

		//init the html code to insert
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
		//display the list
		$this->show('question/question_list', ["rows" => $rows]);		
	}
	
/****************************************
	DISPLAY DETAILS OF A QUESTION
****************************************/
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
	
			//display question details
			$this->show('question/question_consult', [
				"question" => $question,
				"choices" => $choices,
				"quizInfo" => $quizInfo,
			]);
		} else
		{
			//this is actually a custom page for questions
			//show notfound page
			$this->show('question/question_not_found', [
				"questionId" => $questionId,
			]);
		}
	}


/****************************************
	RESEARCH QUESTIONS VIA AJAX
****************************************/

	/**
	 * Select the first 5 results of a title search among questions
	 */

	public function questionSearch(){
		$questionManager = new \Manager\QuestionManager();

		//search a Question by a string
		$array = $questionManager->searchQuestion($_GET["input"]);
		$this->showJson($array);
	}

/****************************************
	ADD QUESTIONS VIA AJAX
****************************************/
	/**
	 * Enable to add questions to current quiz via Ajax
	 */
	public function ajaxAddQuestion(){
		$Quizs__questionManager = new \Manager\Quizs__questionManager();
		$Quizs__questionManager->insert([			
			"quiz_id" => $_POST["quizId"],
			"question_id" =>  $_POST["questionId"],
			"is_active" => 1,
		]);
	} 


}








