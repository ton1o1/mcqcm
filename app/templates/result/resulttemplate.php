<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>
	<h2>Résultats</h2>
	<p>Moyenne : <?=$scoreMoyen ?> sur 100</p>
	<p>Ecart-type : <?=$ecartType ?></p>



<?php $this->stop('main_content') ?>
