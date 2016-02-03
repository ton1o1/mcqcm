<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>
	
	<p></p> 
	<div><strong>Résultats au quiz</strong></div><br /> 
		
	<div>Le quiz <strong><?=$titleQ ?></strong> a pour note moyenne (sur 100) : <strong><?=number_format($moyQuiz["scoreMoyen"],2) ?></strong> et pour écart-type : <strong><?=number_format($moyQuiz["ecartType"],2) ?></strong></div><br />
	<?php $nbCandidat = count($name);
	for ($i=0; $i < $nbCandidat; $i++) { 
		?><div>Le candidat <strong><?= $name[$i] ?></strong> a obtenu à ce quiz une note de : <strong><?=$scoreU[$i] ?></strong> sur <strong>100</strong>.</div>
		<?php } ?>

<?php $this->stop('main_content') ?>