<?php $this->layout('layout', ['title' => 'Editer un quiz']) ?>

<?php $this->start('main_content') ?>
	
	<div class="page-header">
	<a class="btn btn-danger pull-right" href="<?= $this->url('quiz_delete', ['quizId' => $quiz['id']]) ?>" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Supprimer</a>
  		<h1>Editer un quiz</h1>
	</div>
	
	<?= !empty($alerts) ? $alerts : '' ?>
	
	<?php
	$title = $quiz['title'];
	$description = $quiz['description'];

	// If form has been submitted
	if(isset($data)){
		$title = $data['title'];
		$description = $data['description'];
	}

	?>

	<form class="form-horizontal" method="post">
	<input type="hidden" name="quiz[skills][]" value="1" />
  <div class="form-group<?= !empty($errors['title']) ? ' has-error' : '' ?>">
    <label for="title" class="col-sm-2 control-label">Nom du quiz</label>
    <div class="col-sm-10">
      <input type="text" name="quiz[title]" class="form-control" id="title" placeholder="<?= !empty($quiz['title']) ? $quiz['title'] : '' ?>" value="<?= $title ?>" />
      <?= !empty($errors['title']) ? '<p class="text-danger">' . $errors['title'] . '</p>' : '' ?>
    </div>
  </div>
  <div class="form-group<?= !empty($errors['description']) ? ' has-error' : '' ?>">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea name="quiz[description]" class="form-control" rows="4" id="description" placeholder="<?= !empty($quiz['description']) ? $quiz['description'] : '' ?>"><?= $description ?></textarea>
      <?= !empty($errors['description']) ? '<p class="text-danger">' . $errors['description'] . '</p>' : '' ?>
    </div>
  </div>

  <div class="form-group pull-right">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="quiz[submit]" value="1" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Sauvegarder</button>
    </div>
  </div>
</form>

<?php $this->stop('main_content') ?>
