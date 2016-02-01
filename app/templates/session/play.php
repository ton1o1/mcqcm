<?php $this->layout('layout', ['title' => 'Quiz en cours']) ?>

<?php $this->start('main_content') ?>

	<div class="page-header">
  		<h1>Quiz en cours <small>1/30</small></h1>
	</div>

	<?= !empty($alerts) ? $alerts : '' ?>

	

<?php $this->stop('main_content') ?>
