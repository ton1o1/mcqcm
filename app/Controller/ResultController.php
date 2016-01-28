<?php

namespace Controller;

use \W\Controller\Controller;

class ResultController extends Controller {

	public $answer;
	public $result;
	public $userId;
	public $sessionId;

	public function __construct() {

		// $this->result = new \Manager\ResultManager();
		$this->answer = new \Manager\AnswerManager();
	}

	
	public function setUserId($uId) {
		
		$this->answer->userId = $uId;

	}


	public function setSessionId($sId) {

		$this->answer->sessionId = $sId;

	}

	public function setQuizId($qId) {

		$this->answer->quizId = $qId;

	}

	public function view() {

		$this->show('default/results');
	}


	public function viewSession($sessionId) {
		
		$this->answer->setSessionId($sessionId);
		$this->gestionResults('student');
		$this->answer->setTable('sessions');
		$userId = $this->answer->find($sessionId)['user_id'];
		$this->answer->setUserId($userId);
	
	}


	public function viewQuiz($quizId) {

		$this->answer->setTable('sessions');
		if (!empty($quizId)) {
			$this->answer->setQuizId($quizId);
			$this->gestionResults('session');
		} else {
			$this->gestionResults('all');
		}
	} 
		
		


	public function gestionResults($case) {
		
		$this->answer->setTable('sessions');
		$dateStop = $this->answer->date_stop;

		switch ($case) {

			case 'student':
				$now = time();
				if ($now - $dateStop > 1800) {
				$this->answer->userId = $userId;
				$this->answer->studentSessionResult($sessionId, $userId);
				} else {redirect('home');}
				break;
			
			case 'session':
				$quizId = $this->quizId;
				$this->answer->teacherSessionResult($sessionId);
				break;
			
			case 'all':
				$this->answer->allResults();
				break;

			default:
				
				break;
		}
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
				echo ('<span style="font-size: 20px;"><strong>' . $value2 . '</strong></span>');
				}

			}

		echo ". ";
		echo ('<br />' . "\n");

		}

		return $note;

	}


	public function calculNoteStudent($userId, $quizId) {

		/* $sqlUserQuiz = "SELECT u.last_name, u.first_name, q.title FROM quizs q, users u  
		WHERE (u.id = '1') AND (q.user_id = u.id) AND (q.id = '1')";

		$statementUserQuiz = $pdo->prepare($sqlUserQuiz);
		$statementUserQuiz->execute();
		$resultUserQuiz = $statementUserQuiz->fetchAll(); */

		$resultUserQuiz = $this->answer->list_user_quiz($userId, $quizId);

		foreach ($resultUserQuiz as $key => $value) {
			$textPresentation = "Résultats du " . $value["title"] . " pour le candidat " . $value["last_name"] . " " . $value["first_name"] . " : ";
			echo('<h2 style="font-size: 24px; color:blue;"><strong>' . $textPresentation . '</strong></h2>');
			}
		
		$resultat = $this->answer->list_choices_user_quiz($userId, $quizId);

		

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

		foreach ($resultat as $ke => $valu) {
			
			$tabChoice = unserialize($valu["choices"]);
			$tabChoiceTot = $tabChoiceTot + $tabChoice;
			echo('<br />' . "\n");
			echo ('<span style="font-size: 20px";>' . "Pour la question " . '<strong>' . $valu["question_id"] . '</strong>' . ", " . '</span>');

			foreach ($tabChoice as $k => $v) {
				/*
				$sqlSolution = "SELECT c.is_true FROM choices c WHERE c.id = '$key'";
				$statementSolution = $pdo->prepare($sqlSolution);
				$statementSolution->execute();
				$resultSolution = $statementSolution->fetchAll(PDO::FETCH_COLUMN, 0); */

				$this->list_solution_choice($k);
				$tabSolution[$k] = intval($resultSolution[0]);
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

	public function studentSessionResult($userId, $sessionId) {
		$quizId = $this->answer->setTable('sessions').find('$sessionId')['quiz_id'];
		$this->calculNoteStudent($userId, $quizId);
	}

	public function teacherSessionResult($sessionId) {
		$this->calculNoteSession($sessionId);
		$this->medium_calculate('quiz');
	}

	public function allResults() {
		print_r($this->calculNoteAll());
		$this->medium_calculate('all');
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


	public function medium_calculate($x) {
			$totalScore = 0;
			$ecart = 0;
			$ecartMoy = 0;
			$base = 0;
			if ($x == 'quiz') {$data = $this->answer->teacherSessionResult();}
			else if ($x == 'all') {$data = $this->answer->allResults();}
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
			
				return [$scoreMoyen, $ecartType];
			}
		}


	}

?>