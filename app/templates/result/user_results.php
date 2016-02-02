<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>

		<h2>Résultats de userId à sessionId</h2> 
		<p></p> 
		<div>Résultats individuels de <?=$userId ?> pour la session <?=$sessionId ?>

<h2 style="font-size: 24px; color:blue;"><strong><?=$textPresentation ?></strong></h2>
		
	<?php	
	foreach ($resultUserQuiz as $key => $value) {
			$textPresentation = "Résultats du " . $value["title"] . " pour le candidat " . $value["last_name"] . " " . $value["first_name"] . " : ";
			echo('<h2 style="font-size: 24px; color:blue;"><strong>' . $textPresentation . '</strong></h2>');
			} 



		foreach ($resultat as $ke => $valu) {
	
			$tabChoice = unserialize($valu["choices"]);
			$tabChoiceTot = $tabChoiceTot + $tabChoice;
			?><br /><span style="font-size:20px;">Pour la question <strong><?=$valu["question_id"] ?></strong>, </span>

			<?php
		
		$lenArray = count($tabDiff);

		if ($lenArray == 0) {
			
			$note = 1;
			?><span style="font-size: 20px; color:green;"><strong> réponse exacte</strong>. "</span>
			<br />
			<?php } else { if ($lenArray == 1) {
			?><span style="font-size: 20px; color:red;"><strong> erreur</strong></span><span style="font-size: 20px;"> pour le choix suivant : </span> 
			<?php } else {
			?><span style="font-size: 20px; color:red;"><strong> erreurs</strong></span><span style="font-size: 20px;"> pour les choix suivants : </span> 
			<?php }

			foreach ($resultsTitle[0] as $key2 => $value2) {
			?><span style="font-size: 20px;"><strong><?=$value2 ?></strong></span>
			<?php }

			?>. <br />

		}

		// return $note;

	} 

<br /><h2 style="color:red;"><strong>Note : <?=$noteQuiz ?> sur 100</strong></h2>

<?php $this->stop('main_content') ?>
