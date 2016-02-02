<?php $this->layout('layout', ['title' => 'Contact']) ?>

<?php $this->start('main_content') ?>
	<h2>Contact.</h2>
	<p>Vous avez besoin de nous contacter</p>
	<h3>Contactez-nous</h3>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro consequatur obcaecati, praesentium laudantium debitis commodi cumque nobis sequi, sint nesciunt culpa aspernatur quia quo vel autem possimus maxime eum reiciendis.</p>
	<form action="">
		<div class="form-group">
			<label for="">Objet : </label>
			<select name="" id="">
				<option value="">Je vous aime</option>				
				<option value="">A propos d'un quizz</option>				
				<option value="">A propos de mon compte</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Message : </label>
			<textarea name="contact_message" id="" cols="30" rows="10"></textarea>
		</div>
		<div class="form-group">
			<button type="submit">Envoyer</button>
		</div>

	</form>
<?php $this->stop('main_content') ?>
