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

	public function viewInput($userId = NULL, $sessionId = NULL) {

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
		$this->show('result/input_results', ['userId' => $userId, 'sessionId' => $sessionId, 'scores' => $scores, 'quizId' => $quizId, 'quizTitle' => $quizTitle]);
		}



	public function viewUser($userId, $sessionId) {
		
		$this->answer->setTable('sessions');
		$name = $this->answer->userName($userId);

		if (!empty($sessionId)) {
			$dateStop = $this->answer->find($sessionId)['date_stop'];

			if ($dateStop) {
				// $this->studentSessionResult($userId, $sessionId);
				$quizI = $this->answer->findQuizBySession($sessionId)[0]['quiz_id'];
				$quizId = intval($quizI);
				$nbQuizUser = $this->answer->countQuizUser($userId, $quizId);

				if ($nbQuizUser >= 1) {
					// $score = $this->calculNoteStudent($userId, $quizId);
					$resultUserQuiz = $this->answer->list_user_quiz($userId, $quizId);
					$resultat = $this->answer->list_choices_user_quiz($userId, $sessionId);

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
					$resulTotTitle = [];

					foreach ($resultat as $ke => $valu) {
	
						$tabChoice = unserialize($valu["choices"]);
						$tabChoiceTot = $tabChoiceTot + $tabChoice;
						$resulTotTitle[$ke] = "";

						foreach ($tabChoice as $ky => $v) {
							
							$resultSolution = $this->answer->list_solution_choice($ky);
							foreach ($resultSolution[0] as $kee => $vaa) {
								$tabSolution[$ky] = intval($vaa);
							}
						} 

						$m++;

						$note = 0;
						$noteQTot = [];
						$tabDiff = [];
						$textResults = "";
						$clef = 0;

						$tabDiff = array_diff_assoc ($tabChoice, $tabSolution);
						$lenArray = count($tabDiff);
						if ($lenArray == 0) { $note = 1; } else { $note = 0; }


						foreach ($tabDiff as $key => $value) {
							
							$resultsTitle = $this->answer->findTitle($key);	
							$resulTotTitle[$ke] .= " " . $resultsTitle[0]['title'];
							}

							$noteTotale += $note;
						} 

					$userSessionExist = $this->answer->userSession($userId, $sessionId);
					if ($userSessionExist) {
						$noteQuiz = $noteTotale * 100 / $m;
						$score = $noteQuiz;
						$titleQu = $this->answer->quizTitle($quizId)[0]['title'];
						$name = $this->answer->userName($userId);
						$this->answer->student_score_record($userId, $sessionId, $score);

$this->show('result/user_results', ['name' => $name, 'titleQu' => $titleQu, 'resulTotTitle' => $resulTotTitle, 'resultsTitle' => $resultsTitle, 'tabDiff' => $tabDiff, 'resultUserQuiz' => $resultUserQuiz, 'resultat' => $resultat, 'noteQuiz' => $noteQuiz]);
					} else {$this->redirectToRoute('result_view_input');}
				}

				// $this->show('result/user_results', ['name' => $name]);
			} else {$this->redirectToRoute('home');}
		} else {$this->redirectToRoute('home');}
	}


public function viewIndividual($userId) {
		
	$name = $this->answer->userName($userId);		
	$userResu = $this->studentResult($userId);
	$resultsStu = $userResu[0];
	$userRes = $userResu[1];
	$this->show('result/individual_results', ['name' => $name, 'resultsStu' => $resultsStu, 'userRes' => $userRes]);
		
	}

	public function viewQuiz($quizId = null) {

	$this->answer->setTable('sessions');
	if (!empty($quizId)) {
		$titleQ = $this->answer->quizTitle($quizId)[0]['title'];
		// $this->quizResult($quizId);
		$scoreUser = $this->answer->quizUsers($quizId);
		$userId = [];
		$scoreU = [];

		foreach ($scoreUser as $k => $v) {
			$userId[$k] = $v['user_id'];
			$name[$k] = $this->answer->userName($userId[$k]);
			$scoreU[$k] = $v['score'];
			}

		$moyQuiz = $this->medium_calculate("quiz", $quizId);
		$this->show('result/quiz_results', ['userId' => $userId, 'name' => $name, 'quizId' => $quizId, 'moyQuiz' => $moyQuiz, 'titleQ' => $titleQ, 'scoreU' => $scoreU]);
		$this->redirectToRoute('result/quiz', ['quizId' => 1]);
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

		foreach ($tabDiff as $key => $value) {
			
			$resultsTitle = $this->answer->findTitle($key);
			}

		return $note;
	}


	public function calculNoteStudent($userId, $quizId) {

		$resultUserQuiz = $this->answer->list_user_quiz($userId, $quizId);
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
			
			// echo ('<span style="font-size:20px;">' . "Pour la question " . '<strong>' . $valu["question_id"] . '</strong>' . ", " . '</span>');

			foreach ($tabChoice as $ky => $v) {
				
				$resultSolution = $this->answer->list_solution_choice($ky);
					foreach ($resultSolution[0] as $kee => $vaa) {
				$tabSolution[$ky] = intval($vaa);
				}
			} 
			$m++;

		$note = 0;
		$noteQTot = [];
		$tabDiff = [];
		$textResults = "";
		$clef = 0;

		$tabDiff = array_diff_assoc ($tabChoice, $tabSolution);
		$lenArray = count($tabDiff);


		foreach ($tabDiff as $key => $value) {

		/*	if ($clef == 1) {
				echo ", ";
			} else {
				$clef = 1;
			} */
			
			$resultsTitle = $this->answer->findTitle($key);
			}
			$noteTotale += $note;$this->valCompareQuestion($tabChoice, $tabSolution);
		} 

		$noteQuiz = $noteTotale * 100 / $m;
		$titleQu = $this->answer->quizTitle($quizId)[0]['title'];
		$name = $this->answer->userName($userId);
$this->show('result/user_results', ['name' => $name, 'titleQu' => $titleQu, 'resultsTitle' => $resultsTitle, 'tabDiff' => $tabDiff, 'resultUserQuiz' => $resultUserQuiz, 'resultat' => $resultat, 'noteQuiz' => $noteQuiz]);


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
		

		// print_r($resultsStu);
		// $userQuizListId = $this->answer->userQuizList($userId); 
		// var_dump($quizListId);
		$resultsUser = $this->answer->userQuizScore($userId);
		/*foreach ($resultsUser as $kt => $vt) {
			foreach ($vt as $ks => $vs) {
				echo ($vs);
				echo " * "; 
			}
		} */
		return [$resultsStu, $resultsUser];
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
				
			}
		}

	}

?>