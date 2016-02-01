<?php $this->layout('layout', ['title' => 'Créer un quiz']) ?>

<?php $this->start('main_content') ?>

	<div class="page-header">
  		<h1>Créer un quiz <small>1/2</small></h1>
	</div>

	<?= !empty($alerts) ? $alerts : '' ?>

	<form class="form-horizontal" method="post">
  <div class="form-group<?= !empty($errors['title']) ? ' has-error' : '' ?>">
    <label for="title" class="col-sm-2 control-label">Nom du quiz</label>
    <div class="col-sm-10">
      <input type="text" name="quiz[title]" class="form-control" id="title" placeholder="Ex: PHP orienté objet, frameworks et modèle MVC" value="<?= !empty($data['title']) ? $data['title'] : '' ?>" />
      <?= !empty($errors['title']) ? '<p class="text-danger">' . $errors['title'] . '</p>' : '' ?>
    </div>
  </div>
  <div class="form-group<?= !empty($errors['description']) ? ' has-error' : '' ?>">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea name="quiz[description]" class="form-control" rows="4" id="description" placeholder="Ex: Ce quiz s'adresse aux développeurs souhaitant valider leurs compétences en PHP orienté objet et leur maîtrise du modèle MVC. Il intègre également une approche basique du fonctionnement global des frameworks PHP."><?= !empty($data['description']) ? $data['description'] : '' ?></textarea>
      <?= !empty($errors['description']) ? '<p class="text-danger">' . $errors['description'] . '</p>' : '' ?>
    </div>
  </div>
  <div class="form-group<?= !empty($errors['skills']) ? ' has-error' : '' ?>">
    <label for="skillSearchAdd" class="col-sm-2 control-label">Compétences visées</label>
    <div class="col-sm-10 select2fix">
    <select name="quiz[skills][]" id="skillSearchAdd" class="form-control" multiple></select>
      <?= !empty($errors['skills']) ? '<p class="text-danger">' . $errors['skills'] . '</p>' : '' ?>
    </div>
  </div>
  <div class="form-group pull-right">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="quiz[submit]" value="1" class="btn btn-primary">Etape 2 ></button>
    </div>
  </div>
</form>

<?php $this->stop('main_content') ?>
