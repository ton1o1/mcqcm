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
		if($_POST)
		{
			if(!empty($_POST['questionTitle'])){$questionTitle = $_POST['questionTitle'];}
			if(!empty($_POST['questionType'])){$questionType = $_POST['questionType'];}
			//choices values are stored in an array
			if(!empty($_POST['choice1'])){$choices[1] = $_POST['choice1'];}
			if(!empty($_POST['choice2'])){$choices[2] = $_POST['choice2'];}
			if(!empty($_POST['choice3'])){$choices[3] = $_POST['choice3'];}

			//answers that are true are also stored in an array, 
			if(!empty($_POST['solution1'])){
				$solutions[1] = true;
				$_POST['solution1'] = "checked";
			} else {$solutions[1] = false;}
			if(!empty($_POST['solution2'])){
				$solutions[2] = true;
				$_POST['solution2'] = "checked";
			} else {$solutions[2] = false;}
			if(!empty($_POST['solution3'])){
				$solutions[3] = true;
				$_POST['solution3'] = "checked";
			} else {$solutions[3] = false;}


		} else {
			$_POST['questionTitle']= false;

 			$_POST['choice1'] = false;
			$_POST['choice2'] = false;
			$_POST['choice3'] = false;
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
		if(empty($errorMessages))
		{
			$questionManager = new \Manager\QuestionManager();
			$questionManager->setTable('question');
			//insert question title in question table
				if($_POST){
					$questionManager->insert([
						"quiz_id" => 1, //WARNING : value 1 is only temporary, how do we select the quiz id?
						"title" => $questionTitle,
					]);
	
			//insert choices in choices table
				//step 1 : select the last index of the question table
				$lastId = $questionManager->findLast();
				
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
		} else 
		{
			if ($_POST){
				//debug($errorMessages);
				foreach ($errorMessages as $key => $errorMessage) {
					$finalErrorMessage .= $errorMessage . "<br/>";
				}
			}
		}
		//the show method must always be at the end of the function that display because it contains a die() 

		$this->show('quiz/question_build', [
			"finalErrorMessage" => $finalErrorMessage,
			"dataPosted" => $_POST,
		]);
	}


	/**
	 * List of all the questions in order to have a global view
	 * 
	 */
	public function questionList($orderBy = "id", $orderDir = "ASC")
	{

		$questionManager = new \Manager\QuestionManager();
		$questionManager->setTable('question');
		$list = $questionManager->findAll($orderBy, $orderDir);
		$rows = "";

		foreach ($list as $k => $v) { //add in href link to route question-id or quiz-id
			$rows .= "<tr>
						<td>" .
							$v['id'] .
						"</td>
						<td>
							<a href='question/" . $v['id'] . "'>" . $v['title'] . "</a> 
						</td> 
						<td> 
							<a href=''>" . $v['quiz_id'] . "</a>
						</td>
					</tr>";
		}

		$this->show('quiz/question_list', ["rows" => $rows]);		
	}

	/**
	 * Display the content of a question with its choices
	 */
	public function questionConsult($id){
		$questionManager = new \Manager\QuestionManager();
		//get question info
		$questionManager->setTable('question');
		$question = $questionManager->find($id);
		


		//get choices info
		$questionManager->setTable('choice');
		$id = $question["id"];
		$choices = $questionManager->findWhereQuestionId($id);
		$choicesContent =""; //is it necessary to init this variable

		// foreach ($choices as $k => $v) {
		// 	$choicesContent .= "<label class='checkbox-inline'>
		// 			  <input type='checkbox' name='solution1' value='" .
		// 			  $v["solution$k"] .
		// 			  "' id='inlineCheckbox1'>
		// 			  <input type='text' name='choice1' value='" .
		// 			  $v["choice$k"]
		// 			  ">
		// 			</label><br/>";
			
		// }


		$this->show('quiz/question_consult', [
			"question" => $question,
			"choices" => $choices,
		]);


	}

}













