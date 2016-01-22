<?php $this->layout('layout', ['title' => 'Formulaire de création']) ?>

<?php $this->start('main_content') ?>
	<h2>Formulaire de création de question</h2>
	<p>Vous avez atteint la page de création de question</p>
	<div class="process">
		<ol>
			<li>Saisir l'intitulé de la question</li>
			<li>Choisir le type de la question (radio, checkbox)</li>
			<li>Ajouter un ou plusieurs choix nécessaire (5 max)</li>
			<li>Rédiger les choix de la question</li>
			<li>Cocher la ou les bonnes réponses</li>
			<li>Valider le formulaire</li>
		</ol>
	</div> 	
	<form action="" method="POST" class="form-group" novalidate>
		<fieldset>
			<legend>Créer une question</legend>
			<h2>Votre question</h2>
			<div class="form-group">
				<label for="question-title">Intitulé</label>
				<textarea name="questionTitle" id="question-title" rows="5" cols="100" placeholder="Saisissez l'intitulé de la question"></textarea>
			</div>
			<div class="form-group">
				<label for="questionType">Type de question</label>
				<select name="questionType" id="questionType">
					<option value="radio">radio</option>
					<option value="checkbox">checkbox</option>
					<option value="checkbox">drag and drop</option>
				</select>
			</div>
			<h2>Choix<button id="add-choice">Ajouter un choix <!-- créer un .on("click", ) --></button></h2>
			
<!--   -->  <div class="choices">


				<label class="checkbox-inline">
				  <input type="checkbox" name="answer1" value="good" id="inlineCheckbox1"><input type="text" name="choice1"><br/>
				</label><br/>
				<label class="checkbox-inline">
				  <input type="checkbox" name="answer2" value="good" id="inlineCheckbox2"><input type="text" name="choice2">
				</label><br/>

				<label class="checkbox-inline">
				  <input type="checkbox" name="answer3" value="good" id="inlineCheckbox3"><input type="text" name="choice3"><br/><br/>
				</label>


			</div>
<!--   -->			
			<div class="warning">Ici : Message d'erreur en cas de mauvaise saisie de formulaire</div>
			<div class="form-group">
				<input type="submit" value="Ajouter la question au portefeuille">
			</div>
		</fieldset>
	</form>






	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

<?php $this->stop('main_content') ?>
