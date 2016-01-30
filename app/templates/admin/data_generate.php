<?php $this->layout('layout', ['title' => 'Data']) ?>

	<?php ?>
<?php $this->start('main_content') ?>
	<h2>Hello, welcome, to the data generator back office</h2>
	<p>Because as workers, we all know we are pretty lazy when it comes to insert manually data</p>


	<h3>Faker</h3>
	<p></p>
	<form action="" method="POST">
		<label for="Nombre d'utilisateurs"></label>
		<input type="number" min="0" max="100">		
		<input type="submit" value="Générer">
	</form>


	<h3>Scrapper</h3>
	<p></p>

	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
<?php $this->stop('main_content') ?>
