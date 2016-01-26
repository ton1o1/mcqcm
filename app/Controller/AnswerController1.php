<?php

namespace Controller;

use \W\Controller\Controller;

class AnswerController extends Controller
{

	
	public function home()
	{
		$this->show('default/results');
	}


	public function valCompareQuestion($array1, $array2) {

		$noteTotale = 0;
		$noteQTot = [];
		$tabDiff = [];
		$textResults = "";
		$clef = 0;

		$tabDiff = array_diff_assoc ($array1, $array2);
		$lenArray = count($tabDiff);
		if ($lenArray == 0) {
			echo "exacte. ";
			} else { 
				if ($lenArray == 1) {
					echo "erreur pour le choice_id suivant : ";
				} else {
					echo "erreurs pour les choice_ids suivants : "; 
				}
			foreach ($tabDiff as $key => $value) {
				if ($clef == 1) {
					echo ", ";
				} else {
					$clef = 1;
					}
				echo ($key);
			}
			echo ". ";
			}
		}


	$inputUserQuiz = new \W\Manager\Answer;
	($userId, $quizId) = $inputUserQuiz->InputUserManager();
	$sqlUserQuiz = new \W\Manager\Answer;
	$sqlUserQuiz->UserManager($userId, $quizId);


$choiceId = [];
$tabSolution = [];
$tabChoiceTot = [];
$tabChoice = [];
$resultSolution = [];
$str = "";
$strChoice = "";
$answer = "";
$m = 0;

foreach ($result as $key => $value) {
	
	$tabChoice = unserialize($value["choices"]);
	$tabChoiceTot = $tabChoiceTot + $tabChoice;
	echo '<br />' . "\n"; 
	echo ("Pour la question " . $value["question_id"] . ", ");

	foreach ($tabChoice as $key => $value) {
		$extractSolution = new \W\Manager\Answer;
		 = $extractSolution->ExtractSolutionManager();
		}

	valCompareQuestion($tabChoice, $tabSolution);
	} 

echo '<br />' . "\n";


}
