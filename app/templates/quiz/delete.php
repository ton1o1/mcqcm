<?php $this->layout('layout', ['title' => 'Supprimer un quiz']) ?>

<?php $this->start('main_content') ?>
	<h2>Supprimer un quiz</h2>
	<?php
	if($success){
		echo '<div class="error-message">' . $message . '</div>';
	}
	else{
	?>
	<p>Etes-vous sûr de vouloir supprimer le quiz "<?=$title?>" ?</p>
	<form method="POST">
	<?php
	if(!empty($message)){
		echo '<div class="error-message">' . $message . '</div>';
	}
	?>
	<input type="checkbox" name="sure" id="sure" value="1" />
	<label for="sure">Oui, je confirme la suppression</label>
	<button type="submit">Supprimer</button>
	</form>
	<?php
	}
	?>
<?php $this->stop('main_content') ?>
