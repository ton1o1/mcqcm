<?php $this->layout('layout', ['title' => 'Données pour résultats']) ?>

<?php $this->start('main_content') ?>
	<h2>Résultats</h2>
	
	<p>Résultats généraux</p>
	<?php for ($i=1; $i <= $nombre; $i++) { 
		?><div>Le quiz <?=$quizTitle[$i] ?> a pour score : <?=$quizScore[$i] ?></div>
		<?php } ?>

	<p>Résultats individuels</p>



<?php $this->stop('main_content') ?>
