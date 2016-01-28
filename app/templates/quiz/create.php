<?php $this->layout('layout', ['title' => 'Créer un quiz']) ?>

<?php $this->start('main_content') ?>

	<div class="page-header">
  		<h1>Créer un quiz <small>1/2</small></h1>
	</div>

	<?= !empty($alerts) ? $alerts : '' ?>

	<p>Afin de créer un nouveau quiz, commencez par lui attribuer un nom.</p>

	<form method="post">
		<label for="title">Nom du quiz</label>
		<input type="text" name="title" id="title" value="<?= !empty($data['title']) ? $data['title'] : '' ?>" class="champs<?= !empty($errors['title']) ? ' error' : '' ?>" />
		<?= !empty($errors['title']) ? '<div class="error-message">' . $errors['title'] . '</div>' : '' ?>
		
		<button type="submit" name="submit">Créer</button>
	</form>

<?php $this->stop('main_content') ?>
