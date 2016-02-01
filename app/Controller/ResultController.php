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
		
		$this->userId = $uId;

	}


	public function setSessionId($sId) {

		$this->sessionId = $sId;

	}

	public function setQuizId($qId) {

		$this->quizId = $qId;

	}

	public function viewInput() {

		// $quizList = $this->answer->quizList();
		$quizTitle = [];
		$quizId = [];
		$scores = [];
		$quizIdTitle = $this->answer->quizIdTitle();
		foreach ($quizIdTitle as $key=>$val) {
			$quizTitle[$key] = $val['title'];
			$quizId[$key] = $val['id'];
			$scores[$key] = $this->medium_calculate('quiz', $quizId[$key]);
			}
		$this->show('result/input_results', ['scores' => $scores, 'quizTitle' => $quizTitle]);
		}



	public function viewUser($userId, $sessionId = null) {
		
		$this->answer->setTable('sessions');
		if (!empty($sessionId)) {
		$dateStop = $this->answer->find($sessionId)['date_stop'];
			if ($dateStop) {
				$this->studentSessionResult($userId, $sessionId);
				} else {$this->redirectToRoute('home');}
		} else {$this->studentResult($userId);}
	}


	public function viewQuiz($quizId = null) {


		$this->answer->setTable('sessions');
		if (!empty($quizId)) {
			// $this->answer->setQuizId($quizId);
		// 	$quizId = $this->quizId;
			$this->quizResult($quizId);
			$scoreUser = $this->answer->quizUsers($quizId);
			$userId = [];
			$scoreU = [];
			foreach ($scoreUser as $k => $v) {
				$userId[$k] = $v['user_id'];
				$scoreU[$k] = $v['score'];
				}
			// $this->teacherSessionResult($quizId);
			$this->show('result/quiz_results', ['quizId' => $quizId, 'userId' => $userId, 'scoreU' => $scoreU]);
		} else {
			$this->allResults();
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
			
			$resultsTitle = $this->answer->findTitle($key);
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
			echo ('<span style="font-size:20px;">' . "Pour la question " . '<strong>' . $valu["question_id"] . '</strong>' . ", " . '</span>');

			foreach ($tabChoice as $ky => $v) {
				
				$resultSolution = $this->answer->list_solution_choice($ky);
					foreach ($resultSolution[0] as $kee => $vaa) {
				$tabSolution[$ky] = intval($vaa);
				}
			} 
			$m++;
			$noteTotale += $this->valCompareQuestion($tabChoice, $tabSolution);
		} 

		$noteQuiz = $noteTotale * 100 / $m;

		echo ('<br />' . "\n");
		echo ('<h2 style="color:red;"><strong>' . "Note : " . $noteQuiz . "/100" . '</strong></h2>');
		return $noteQuiz;
	}

	
	public function calculNoteQuiz($quizId) {
		
	}


	public function studentSessionResult($userId, $sessionId) {
		// $this->answer->setTable('sessions');
		$quizI = $this->answer->findQuizBySession($sessionId)[0]['quiz_id'];
		$quizId = intval($quizI);
		$nbQuizUser = $this->answer->countQuizUser($userId, $quizId);
		if ($nbQuizUser >= 1) {
			$score = $this->calculNoteStudent($userId, $quizId);
			$this->answer->student_score_record($userId, $sessionId, $score);
		}
	}

	
	public function studentResult($userId) {
		$resultsStu = $this->medium_calculate('student', $userId);
		print_r($resultsStu);
		// $userQuizListId = $this->answer->userQuizList($userId); 
		// var_dump($quizListId);
		$resultsUser = $this->answer->userQuizScore($userId);
		foreach ($resultsUser as $kt => $vt) {
			foreach ($vt as $ks => $vs) {
				echo " X ";
				echo ($vs);
				echo " * ";
			}
		}
	}


	public function teacherSessionResult($sessionId) {
		$resultsSes = [];
		$resultsSes = $this->medium_calculate('session', $sessionId);
		$this->show('result/resulttemplate', $resultsSes);
		// print_r($resultsSes);
	}

	public function quizResult($quizId) {
		$resultsQui = $this->medium_calculate('quiz', $quizId);
		foreach ($resultsQui as $kr => $vr) {
			echo " * ";
			print_r($vr);
			echo " XX ";
		}
	}


	public function allResults() {
		// print_r($this->calculNoteAll());
		$resultsAll = $this->medium_calculate('all', 0);
		print_r($resultsAll);
		$quizListId = $this->answer->quizList(); 
		// var_dump($quizListId);
		foreach ($quizListId as $key => $value) {
			foreach ($value as $kl => $vl) {
				$this->quizResult($vl);
			}
		}
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


	public function medium_calculate($x, $id) {
			$totalScore = 0;
			$ecart = 0;
			$ecartMoy = 0;
			$base = 0;

			switch ($x) {
				case 'student':
					$data = $this->answer->student_results($id);
					break;
				case 'session':
					$data = $this->answer->session_results($id);
					break;
				case 'quiz':
					$data = $this->answer->quiz_results($id);
					break;
				case 'all':
					$data = $this->answer->all_results();
					break;
				default:
					break;
			}

			$numberScore = count($data);

			if ($numberScore > 0) { 

				// Calcul de la moyenne de tous les scores réalisés

				foreach ($data as $key => $value) {
					foreach ($value as $keyy => $valuee) {
						$totalScore += $valuee;
					}
				}
				$scoreMoyen = $totalScore / $numberScore;

				
				// Calcul de l'écart-type de tous les scores réalisés

				foreach ($data as $key => $value) {
					foreach ($value as $keyz => $valuez) {
					$base = $valuez - $scoreMoyen;
					$ecart += pow($base, 2);
					}
				}
				$ecartMoy = $ecart / $numberScore;
				$ecartType = sqrt($ecartMoy);
				return ['scoreMoyen' => $scoreMoyen, 'ecartType' => $ecartType];
				// $this->show('result/resulttemplate', ['scoreMoyen' => $scoreMoyen, 'ecartType' => $ecartType]);
				// print_r($scoreMoyen);
				// print_r($ecartType);
				// return [$scoreMoyen, $ecartType];
			}
		}


	}

?>