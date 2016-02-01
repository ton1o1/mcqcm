<?php $this->layout('layout', ['title' => 'Détails question']) ?>

<?php $this->start('main_content'); ?>

	<h1>
		Désolé, la question n° <?= $questionId ?> est introuvable.
	</h1>

	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

<?php $this->stop('main_content') ?>
