<?php $this->layout('layout', ['title' => 'Créer un quiz']) ?>

<?php $this->start('main_content') ?>
	<h2>Créer un quiz</h2>
	<p>Afin de créer un nouveau quiz, commencez par lui attribuer un nom.</p>
	<form method="POST">
	<label for="title">Nom du quiz</label>
	<input type="text" name="title" id="title" value="<?= !empty($data['title']) ? $data['title'] : '' ?>" class="champs<?= !empty($errors['title']) ? ' error' : '' ?>" />
	<?php
	if(!empty($errors['title'])){
		echo '<div class="error-message">' . $errors['title'] . '</div>';
	}
	?>
	<button type="submit">Créer</button>
	</form>
<?php $this->stop('main_content') ?>
