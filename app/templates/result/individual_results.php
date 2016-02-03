<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>

	<p></p> 
		<div><strong><u>Résultats de <?= $name ?></u></strong></div> 
		<br />		
		<div>Il a obtenu pour note moyenne (sur 100) : <strong><?=number_format($resultsStu['scoreMoyen'],2) ?></strong> et pour écart-type : <strong><?=number_format($resultsStu['ecartType'],2) ?></strong></div>
		<br />
		<?php foreach($userRes as $key => $value) { 
			$resultsUser = $value['score'];
			$quiId = $value['quiz_id'];
			?>
		<div>Il a obtenu au quiz <strong><?=$quiId ?></strong> une note de : <strong><?=$resultsUser ?></strong> sur 100.</div>
		<?php } ?>

<?php $this->stop('main_content') ?>
