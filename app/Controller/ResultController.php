<?php

namespace Controller;

use \W\Controller\Controller;

class ResultController extends Controller
{

	public function view()
	{
		$this->show('default/results');
	}


	public function valCompareQuestion($array1, $array2) {

		$note = 0;
		$noteQTot = [];
		$tabDiff = [];
		$textResults = "";
		$clef = 0;

		$tabDiff = array_diff_assoc ($array1, $array2);
		$lenArray = count($tabDiff);

		if ($lenArray == 0) {
			$note = 1;
			echo('<span style="font-size: 20px; color:green;"><strong>' . "réponse exacte" . '</strong>' . ". " . '</span>');
			echo ('<br />' . "\n");
		} else { 
			if ($lenArray == 1) {
				echo('<span style="font-size: 20px; color:red;"><strong>' . "erreur" . '</strong>' . '</span><span style="font-size: 20px;">' . " pour le choix suivant : " . '</span>');
			} else {
				echo('<span style="font-size: 20px; color:red;"><strong>' . "erreurs" . '</strong>' . '</span><span style="font-size: 20px;">' . " pour les choix suivants : " . '</span>'); 
			}

		foreach ($tabDiff as $key => $value) {

			if ($clef == 1) {
				echo ", ";
			} else {
				$clef = 1;
				}
			
/*			$pdo = new PDO('mysql:host=localhost;dbname=mcqcm2', 'root');
			$sqlTitle = "SELECT title FROM choices WHERE id = '$key'";
			$statementTitle = $pdo->prepare($sqlTitle);
			$statementTitle->execute();
			$resultsTitle = $statementTitle->fetchAll(); */

			
			foreach ($resultsTitle[0] as $key2 => $value2) {
				echo ('<span style="font-size: 20px;><strong>' . $value2 . '</strong></span>');
				}

			}

		echo ". ";
		echo ('<br />' . "\n");

		}

		return ($note);

	}


	public function calculNote($userId, $quizId) {

		/* $sqlUserQuiz = "SELECT u.last_name, u.first_name, q.title FROM quizs q, users u  
		WHERE (u.id = '1') AND (q.user_id = u.id) AND (q.id = '1')";

		$statementUserQuiz = $pdo->prepare($sqlUserQuiz);
		$statementUserQuiz->execute();
		$resultUserQuiz = $statementUserQuiz->fetchAll(); */

		$this->list_user_quiz($userId, $quizId)

		foreach ($resultUserQuiz as $key => $value) {
			$textPresentation = "Résultats du " . $value["title"] . " pour le candidat " . $value["last_name"] . " " . $value["first_name"] . " : ";
			echo('<h2 style="font-size: 24px; color:blue;"><strong>' . $textPresentation . '</strong></h2>');
			}
		
		$this->list_choices_user_quiz($userId, $quizId);

		/*
		$sql = "SELECT a.choices, a.question_id FROM quizs__questions q, answers a 
		WHERE (q.question_id = a.question_id) AND (a.user_id = '1') AND (q.quiz_id = '1')";

		$statement = $pdo->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
		*/

		$choiceId = [];
		$tabSolution = [];
		$tabChoiceTot = [];
		$tabChoice = [];
		$resultSolution = [];
		$str = "";
		$strChoice = "";
		$answer = "";
		$m = 0;
		$noteTotale = 0;

		foreach ($result as $key => $value) {
			
			$tabChoice = unserialize($value["choices"]);
			$tabChoiceTot = $tabChoiceTot + $tabChoice;
			echo('<br />' . "\n");
			echo ('<span style="font-size: 20px;">' . "Pour la question " . '<strong>' . $value["question_id"] . '</strong>' . ", " . '</span>');

			foreach ($tabChoice as $key => $value) {
				/*
				$sqlSolution = "SELECT c.is_true FROM choices c WHERE c.id = '$key'";
				$statementSolution = $pdo->prepare($sqlSolution);
				$statementSolution->execute();
				$resultSolution = $statementSolution->fetchAll(PDO::FETCH_COLUMN, 0); */

				$this->list_solution_choice($key);
				$tabSolution[$key] = intval($resultSolution[0]);
			}

			$noteTotale += valCompareQuestion($tabChoice, $tabSolution);
		} 

		echo ('<br />' . "\n");
		echo ('<h2 style="color:red;"><strong>' . "Note : " . $noteTotale . "/20" . '</strong></h2>');
	
	}

/*
$answer = new \AnswerManager;
$answer->table = $table;
$results = $answer->find($choiId);
$result = $results['$chp'];
*/

	public function studentSessionResult($sessionId, $userId) {
		calculNote($sessionId, $userId);
	}

	public function teacherSessionResult($sessionId) {
		calculNote($sessionId);
	}

	public function studentResults($userId) {
		calculNote($userId);
	}


	public function teacherResults($sessionId) {
		calculNote($sessionId);
	}

	

/*
	public function allResults() {
		$sqlAll = "SELECT DISTINCT session_id FROM sessions_users";
		$statementAll = $pdo->prepare($sqlAll);
		$statementAll->execute();
		$resultAll = $statementAll->fetchAll(PDO::FETCH_COLUMN, 0);
		foreach($resultAll as $key => $value) {
			teacherResult($value);
		}
	}
}

*/


/*
	$answers = new \AnswerController;
	$results = $answers->studentSessionResult($sessionId, $userId);

	$answer = new \AnswerManager;
	$result = $answer->chp_table_id_find($champ, $table, $id);
	$results = $answer->studentSessionResult($sessionId, $userId);
*/


	public function medium_calculate()
		{
			$totalScore = 0;
			$ecart = 0;
			$ecartMoy = 0;
			$base = 0;
			$data = $this->all_result_viewer();
			$numberScore = count($data);

			if ($numberScore > 0) { 

				// Calcul de la moyenne de tous les scores réalisés

				foreach ($data as $key => $value) {
					$totalScore += $value;
					}
				$scoreMoyen = $totalScore / $numberScore;

				
				// Calcul de l'écart-type de tous les scores réalisés

				foreach ($data as $key => $value) {
					$base = $value - $scoreMoyen;
					$ecart += pow($base, 2);
					}
				$ecartMoy = $ecart / $numberScore;
				$ecartType = sqrt($ecartMoy);
			
				return $scoreMoyen, $ecartType;
			}
		}

}
