<?php $this->layout('layout', ['title' => 'Editer un quiz']) ?>

<?php $this->start('main_content') ?>
	
	<h2>Editer un quiz</h2>
	
	<?= !empty($alerts) ? $alerts : '' ?>
	
	<form method="POST">

		<label>Nom actuel</label>
		<input type="text" value="<?= !empty($quiz['title']) ? $quiz['title'] : '' ?>" class="champs" disabled />

		<label for="title">Nouveau nom</label>
		<input type="text" name="title" id="title" value="<?= !empty($data['title']) ? $data['title'] : '' ?>" class="champs<?= !empty($errors['title']) ? ' error' : '' ?>" />
		<?= !empty($errors['title']) ? '<div class="error-message">' . $errors['title'] . '</div>' : '' ?>
		
		<button type="submit">Créer</button>
	</form>

<?php $this->stop('main_content') ?>
