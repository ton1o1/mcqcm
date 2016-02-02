<?php $this->layout('layout', ['title' => 'Données pour résultats']) ?>

<?php $this->start('main_content') ?>
	<h2>Résultats</h2>
	
	<p>Résultats généraux</p>
	<?php $nbQuiz = count($quizTitle);
	 for ($i=0; $i < $nbQuiz; $i++) {  if ($scores[$i]['scoreMoyen'] > 0.0) {

		?><div>Le quiz <?=$quizTitle[$i] ?> a pour note moyenne : <?=$scores[$i]['scoreMoyen'] ?> et pour écart-type : <?=$scores[$i]['ecartType'] ?>.</div>
		<?php }
		} ?>


	<p>Résultats détaillés</p>

	<form method="GET">

		<label>Choisir un quiz </label><br />
		<select name="quiz">
		<?php $nbQuiz = count($quizTitle);
	 	for ($j=0; $j < $nbQuiz; $j++) {  if ($scores[$j]['scoreMoyen'] > 0.0) { ?>
			<option value="<?=$quizTitle[$j] ?>"><?=$quizTitle[$j] ?></option>
		<?php } ?>
		
		<?php } ?> </select>

		<button type="submit">Valider</button>
	</form>


<?php $this->stop('main_content') ?>
