<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>
 
		<h2>Résultats de userId à sessionId</h2> 
		<p></p> 
		<div>Résultats individuels de <?=$userId ?> pour la session <?=$sessionId ?>

<?php $resultUserQuiz = $this->answer->list_user_quiz($userId, $quizId);
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

		// return $note;

	

	} 

		$noteQuiz = $noteTotale * 100 / $m;

		echo ('<br />' . "\n");
		echo ('<h2 style="color:red;"><strong>' . "Note : " . $noteQuiz . "/100" . '</strong></h2>');
		// return $noteQuiz;

 $this->stop('main_content') ?>
