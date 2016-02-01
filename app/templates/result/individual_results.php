<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>

	<p></p> 
		<div> Résultats de <strong><?= $name ?></strong></div> 
		<br />		
		<div>Ce candidat a pour note moyenne : <?=$resultsStu['scoreMoyen'] ?> et pour écart-type : <?=$resultsStu['ecartType'] ?></div>
		<br />
		<?php foreach($userRes as $key => $value) { 
			$resultsUser = $value['score'];
			$quiId = $value['quiz_id'];
			?>
		<div>Il a obtenu à ce quiz <?=$quiId ?> une note de : <?=$resultsUser ?> sur 100.</div>
		<?php } ?>

<?php $this->stop('main_content') ?>
