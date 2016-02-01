<?php $this->layout('layout', ['title' => 'Détails question']) ?>

<?php $this->start('main_content'); ?>

	<form action="" method="POST" class="form-group" novalidate>
		<fieldset>
			<legend>Fiche question</legend>
			<h2>Question n°<?= $question['id']?> du quiz n° <?php echo $quizInfo[0]['quiz_id']; ?></h2>
			<p>Attention, vous ne pouvez changer que le texte de la question et le texte des choix</p>
			<div class="form-group">

				<label for="question-title">Intitulé</label>
				<textarea name="questionTitle" id="question-title" rows="5" cols="100" disabled><?= $question['title']?></textarea>
			</div>
			<h2>Choix</h2>
			
<!--   -->  <div class="choices">
				<label class="checkbox-inline">
				  <input type="checkbox" name="solution1" value="true" id="inlineCheckbox1" <?= $checked[0] ?> disabled><input type="text" name="choice1" value="<?= $choices[0]['title'] ?>" disabled>
				</label><br/>
				<label class="checkbox-inline">
				  <input type="checkbox" name="solution2" value="true" id="inlineCheckbox2" <?= $checked[1] ?> disabled><input type="text" name="choice2" value="<?= $choices[1]['title'] ?>" disabled>
				</label><br/>
				<label class="checkbox-inline">
				  <input type="checkbox" name="solution3" value="true" id="inlineCheckbox3" <?= $checked[2] ?> disabled><input type="text" name="choice3" value="<?= $choices[2]['title'] ?>" disabled><br/>
				</label>
			</div>
<!--   -->			

			<div class="form-group">
				<input type="submit" value="Créer une nouvelle question à partir de celle-ci">
			</div>
		</fieldset>
	</form>






	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

<?php $this->stop('main_content') ?>
