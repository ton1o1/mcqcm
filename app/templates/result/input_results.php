<?php $this->layout('layout', ['title' => 'Données pour résultats']) ?>

<?php $this->start('main_content') ?>
	<h2>Résultats</h2>
	
	<p>Résultats généraux</p>
	<?php for ($i=0; $i <= 10; $i++) {  
		?><div>Le quiz <?=$quizTitle[$i] ?> a pour note moyenne : <?=$scores[$i]['scoreMoyen']; ?> et pour écart-type : <?=$scores[$i]['ecartType']; ?></div>
		<?php } ?>


	<p>Résultats individuels</p>



<?php $this->stop('main_content') ?>
