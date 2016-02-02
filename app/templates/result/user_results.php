<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>

		<h2>Résultats du candidat <?=$name ?> au quiz <?=$titleQu ?></h2> 
		<p></p> 
		
	<?php	
	foreach ($resultUserQuiz as $key => $value) {
			
			
			} 



	foreach ($resultat as $kez => $valuz) { ?>
	
			<br /><span style="font-size:20px;">Pour la question <strong><?=$valuz["question_id"] ?></strong>, </span>

			<?php
		if (empty($resulTotTitle[$kez])) {$lenArray = 0;} else {
		$lenArray = count($resulTotTitle[$kez]);
		}

		if ($lenArray == 0) {
			$note = 1;
			?><span style="font-size: 20px; color:green;"><strong> réponse exacte</strong>. </span>
			<br />
			<?php } else { if ($lenArray == 1) {
			?><span style="font-size: 20px; color:red;"><strong> erreur</strong></span><span style="font-size: 20px;"> pour le choix suivant : </span> 
			<?php echo($resulTotTitle[$kez]); } else {
			?><span style="font-size: 20px; color:red;"><strong> erreurs</strong></span><span style="font-size: 20px;"> pour les choix suivants : </span> 
			<?php echo($resulTotTitle[$kez]); }

			


			?>. <br />

		<?php } 

		// return $note;

	} ?>

<br /><h2 style="color:red;"><strong>Note : <?=$noteQuiz ?> sur 100.</strong></h2>

<?php $this->stop('main_content') ?>