<?php $this->layout('layout', ['title' => $quiz['title']]) ?>

<?php $this->start('main_content') ?>

<?= !empty($alerts) ? $alerts : '' ?>

<div class="jumbotron clearfix">
  <h1><?= $quiz['title'] ?></h1>
  <p><?=$quiz['description']?></p>
  <p class="pull-right"><a class="btn btn-primary btn-lg" title="Lancer le quiz" href="<?= $this->url('session_play', ['quizId' => $quiz['id']]) ?>" role="button">Lancer le quiz !</a></p>
</div>

<?php $this->stop('main_content') ?>

<?php $this->start('scripts') ?>

<?php $this->stop('scripts') ?>
