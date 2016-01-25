<?php $this->layout('layout', ['title' => 'Editer un quiz']) ?>

<?php $this->start('main_content') ?>
	<h2>Editer le quiz</h2>
	<form method="POST">
		<label for="title">Nom du quiz</label>
		<input type="text" name="title" id="title" value="<?= !empty($data['title']) ? $data['title'] : '' ?>" class="champs<?= !empty($errors['title']) ? ' error' : '' ?>" />
		<?php
		if(!empty($errors['title'])){
			echo '<div class="error-message">' . $errors['title'] . '</div>';
		}
		?>
		<button type="submit">Sauvegarder</button>
	</form>
<?php $this->stop('main_content') ?>
