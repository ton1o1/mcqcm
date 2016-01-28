<?php $this->layout('layout', ['title' => 'Formulaire de création de question']) ?>
<!-- 
Unit tests :
	all fields are filled
		OK : insert success in question table, choice table
		OK : display successMessage
		KO : fields are resetted
	first time on page 
		OK : no error messages
	submit fails
		OK : filled fields are still filled
-->
<?php $this->start('main_content'); ?>
<!-- 	<h2>Formulaire de création de question</h2>
<p>Vous avez atteint la page de création de question</p> -->
	<div class="process">
		<ol>
			<li>Saisir l'intitulé de la question</li>
			<li>Choisir le type de la question (radio, checkbox)</li>
			<li>Ajouter un ou plusieurs choix nécessaire (5 max)</li>
			<li>Rédiger les choix de la question</li>
			<li>Cocher la ou les bonnes réponses</li>
			<li>Valider le formulaire ok</li>
		</ol>
	</div> 	
	
	<section class="searchQuestion">
	<form action="#" method="GET" id="search-question">
		<label label="search-form-question">Rechercher une question : </label>
		<input type="text" id="search-question">
		
		
	</form>
		<div class="results-list"></div>
	</section>



	<section class="addQuestion">
		<form action="" method="POST" class="form-group" novalidate>
			<fieldset>
				<legend>Créer une question</legend>
				<h2>Votre question</h2>
				<div class="form-group">
					<!-- change for for="question-title" then test -->
					<label for="questionTitle">Intitulé</label>
					<textarea name="questionTitle" id="questionTitle" rows="5" cols="100" placeholder="Saisissez l'intitulé de la question"><?php echo $dataPosted['questionTitle']; ?></textarea>
				</div>
				<div>
					<label>Choisir le quiz</label><input type="number" name="quizId" min="0" max="100" step="1" value="1">
				</div>
				<div class="form-group">
					<label for="questionType">Type de question</label>
					<select name="questionType" id="questionType">
						<option value="radio">radio</option>
						<option value="checkbox">checkbox</option>
						<option value="draganddrop">drag and drop</option>
					</select>
				</div>
				<h2>Choix : <button id="add-choice">Ajouter un choix <!-- créer un .on("click", ) --></button></h2>
				
	<!--   -->  <div class="choices">
					<label class="checkbox-inline">
					  <input type="checkbox" name="solution1" value="true" id="inlineCheckbox1" <?php if(!empty($dataPosted['solution1'])){echo "checked";} ?>>
					  <input type="text" name="choice1" value="<?php echo $dataPosted['choice1']; ?>">
					</label><br/>
					<label class="checkbox-inline">
					  <input type="checkbox" name="solution2" value="true" id="inlineCheckbox2" <?php if(!empty($dataPosted['solution2'])){echo "checked";} ?>>
					  <input type="text" name="choice2" value="<?php echo $dataPosted['choice2']; ?>">
					</label><br/>
					<label class="checkbox-inline">
					  <input type="checkbox" name="solution3" value="true" id="inlineCheckbox3" <?php if(!empty($dataPosted['solution3'])){echo "checked";} ?>>
					  <input type="text" name="choice3" value="<?php echo $dataPosted['choice3']; ?>"><br/>
					</label>
				</div>
				
	<!--   -->			
				<div class="warning">
					<?php if (!$_POST){echo $finalErrorMessage;} ?>
					<?php echo $successMessage ?>
				</div;>
				<div class="form-group">
					<input type="submit" value="Ajouter la question au portefeuille">
				</div>
			</fieldset>
		</form>
	</section>

	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
	<script type="text/javascript" src="/mcqcm/public/assets/js/jquery.min.js"> 
	</script>
	<script type="text/javascript" src="assets/js/searchQuestion.js"></script>
<?php $this->stop('main_content') ?>
