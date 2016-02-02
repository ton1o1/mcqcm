<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>
	
		<p></p> 
		<div> Résultats au quiz </div> 
		
		<div>Le quiz <?=$titleQ ?> a pour note moyenne : <?=$moyQuiz["scoreMoyen"] ?> et pour écart-type : <?=$moyQuiz["ecartType"] ?></div>
		<?php $nbCandidat = count($name);
		for ($i=0; $i < $nbCandidat; $i++) { 
			?><div>Le candidat <?= $name[$i] ?> a obtenu à ce quiz une note de : <?=$scoreU[$i] ?> sur 100.</div>
		 <?php } ?>
		 

<?php $this->stop('main_content') ?>
