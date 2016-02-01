<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>
	
		<p></p> 
		<div> Résultats au quiz <?= $quizId ?></div> 
		
		<div>Le quiz  a pour note moyenne :  et pour écart-type : </div>
		
		<?php for ($i=0; $i <= 4; $i++) { 
			?><div>Le candidat<?=$userId[$i] ?> a obtenu à ce quiz une note de : <?=$scoreU[$i] ?></div>
		 <?php } ?>
		 

<?php $this->stop('main_content') ?>
