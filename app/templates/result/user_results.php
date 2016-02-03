<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>

		<strong><u>Résultats du candidat <?=$name ?> au quiz <?=$titleQu ?></u></strong>
		<p></p><br /> 
		
	<?php	

	foreach ($resultat as $kez => $valuz) { ?>
	
		<span>Pour la question <strong><?=$valuz["question_id"] ?></strong>, </span>

		<?php
		if (empty($resulTotTitle[$kez])) {$lenArray = 0;} else 
			{$lenArray = count($resulTotTitle[$kez]);}

		if ($lenArray == 0) {
			$note = 1;
			?><span style="color:green;"><strong> réponse exacte</strong></span>
			<?php } 
		else { ?><span style="color:red;"><strong> erreur(s)</strong></span><span> pour le(s) choix suivant(s) : </span> 
			<?php echo($resulTotTitle[$kez]); } ?>. 
		<br />
	<?php }  ?>

<br /><h4 style="color:red;"><strong>Note : <?=$noteQuiz ?> sur 100</strong></h4>.

<?php $this->stop('main_content') ?>