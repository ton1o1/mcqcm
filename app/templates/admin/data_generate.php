
<?php $this->layout('layout', ['title' => 'Data']) ?>

	<?php ?>
<?php $this->start('main_content') ?>
	<h2>Hello, welcome, to the data generator back office</h2>
	<p>Because as workers, we all know we are pretty lazy when it comes to insert manually data</p>

	<h3>Ajout d'utilisateur via Faker</h3>
	
	<form action="" method="POST">
		<label for="Nombre d'utilisateurs">Combien d'utilisateurs voulez-vous générer?</label>
		<input id="nbToInsert" type="number" min="0" max="100" name="nbToInsert" value="1">		
		<input type="submit" value="Générer utilisateurs">
	</form>
	<?php if(isset($resultat)){echo $resultat;} ?>

	<br/>
	<br/>
	<br/>
	<h3>Scrapper</h3>
	<p></p>

	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
<?php $this->stop('main_content') ?>



