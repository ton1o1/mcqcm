<?php $this->layout('layout', ['title' => $quiz['title']]) ?>

<?php $this->start('main_content') ?>

	<div class="page-header">
  		<h1><?= $quiz['title'] ?></h1>
	</div>

	<?= !empty($alerts) ? $alerts : '' ?>

<?php
if($w_user && $w_user['id'] == $quiz['creator_id']){
?>

<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Voir</a></li>
  <li role="presentation"><a href="<?=$this->url('quiz_edit', ['quizId' => $quiz['id']])?>">Editer</a></li>
</ul>

<?php
}
?>

<p><?=$quiz['description']?></p>

<?php $this->stop('main_content') ?>

<?php $this->start('scripts') ?>

<?php $this->stop('scripts') ?>
