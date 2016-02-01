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
			} else { $errorMsg['title'] = "KO-title ";}

			//if(!empty($_POST['questionType'])){
			//	$questionType = $_POST['questionType'];
			//} else { $edrrorMsg['type'] = "KO-type ";}

			//***choices values are stored in an array
			if(!empty($_POST['choice1'])){
				$choices[1] = $_POST['choice1'];
			} else { $errorMsg['choice1'] = "KO-choix1";}

			if(!empty($_POST['choice2'])){
				$choices[2] = $_POST['choice2'];
			} else { $errorMsg['choice2'] = "KO-choix2";}

			if(!empty($_POST['choice3'])){
				$choices[3] = $_POST['choice3'];
			} else { $errorMsg['choice3'] = "KO-choix3";}

			if(!empty($_POST['choice4'])){
				$choices[4] = $_POST['choice4'];
			} else { $errorMsg['choice4'] = "KO-choix4";}

			debug($_POST);
			//answers that are true are also stored in an array, 
			if(!empty($_POST['solution1'])){
				$solutions[1] = "checked"; //or true?
			} else
			{
				$solutions[1] = false;
			}
			if(!empty($_POST['solution2'])){
				$solutions[2] = "checked"; //or true?
			} else
			{
				$solutions[2] = false;
			}
			if(!empty($_POST['solution3'])){
				$solutions[3] = "checked"; //or true?
			} else
			{
				$solutions[3] = false;
			}
			if(!empty($_POST['solution4'])){
				$solutions[4] = "checked"; //or true?
			} else
			{
				$solutions[4] = false;
			}

			if(empty($_POST['solution1']) && empty($_POST['solution2']) && empty($_POST['solution3']) && empty($_POST['solution4'])){
				$errorMsg['solution'] = "KO solution";
			}

			if(empty($errorMsg))
			{
				$questionManager = new \Manager\QuestionManager();
				//insert question title in question table
				$questionManager->insert([
					//"quiz_id" => $quizId,
					"creator_id" => 1, //this value will came from $_SESSION['user']['id']
					"title" => $questionTitle,
				]);
		
				//***insert choices in choices table
					//step 1 : select the last index of the question table
				$lastId = $questionManager->findLast(); //needs to work with guillaume
				
				//step 2 : insert choice in choice table
				$choiceManager = new \Manager\ChoiceManager();
				//$questionManager->setTable('choices');
				if($_POST){
					foreach ($choices as $k => $v) {
						$choiceManager->insert([
							"question_id" => $lastId['id'],
							"title" => $v,
							"is_true" => $solutions[$k] && true,
							"is_active" => 1,

						]); 
					}
				}
				unset($_POST);
				$_POST["success"] = "Votre question vient d'être ajoutée à la base.";
			}

		}
		if(!isset($errorMsg)){$errorMsg=NULL;}
		debug($errorMsg);
		debug($_POST);



		$this->show('question/question_build', [
			//"insertion" => $insertion,
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
	//old line : <a href='question/" . $v['id'] . "'>" . $v['title'] . "</a> 
	/**
	 * Display the content of a question with its choices
	 */
	public function questionConsult($questionId){
		$questionManager = new \Manager\QuestionManager();
		//get question info
		$question = $questionManager->find($questionId);
		debug($question);

		//get choices info
		if($question){
			$choiceManager = new \Manager\ChoiceManager();
			$questionId = $question["id"];	
	
			$choices = $choiceManager->findChoiceByQuestionId($questionId);
			$choicesContent =""; //is it necessary to init this variable
			$checked = [];
			foreach ($choices as $k => $v) {
				$checked[$k] = ($v['is_true']) ? "checked" : "";
			}
			//debug($checked);
	
			//get quiz info
			$Quizs__questionManager = new \Manager\Quizs__questionManager();
			$Quizs__questionManager->setTable("quizs__questions");
	
			$quizInfo = $Quizs__questionManager->findQuizIdBy($questionId);
			//debug($quizInfo);
	
	
			$this->show('quiz/question_consult', [
				"question" => $question,
				"choices" => $choices,
				"checked" => $checked,
				"quizInfo" => $quizInfo,
		]);
		} else
		{
			$this->show('question/question_fail', [
				"questionId" => $questionId,
			]);
		}
	}




	/**
	 * Select the first 5 results of a title search among questions
	 */

	public function questionSearch(){
		$questionManager = new \Manager\QuestionManager();

		//search a Question by a string
		$array = $questionManager->searchQuestion($_GET["input"]);
		$this->showJson($array);

	}

	function isInsertWorked($array){
		
	}


}







//
    //[questionTitle]
    //[quizId]
    //[questionType]
    //[solution1]
    //[choice1]
    //[solution2]
    //[choice2]
    //[solution3]
    //[choice3]
    //[solution4]
    //[choice4]



