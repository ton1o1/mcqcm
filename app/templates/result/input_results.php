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


		
		
	<br /><br />

		<div>Résultats individuels</div><br />
		<?php 
		if (!empty($userId)) { 
			echo('<a href="'.$this->url('result_view_individual', ['userId' => $userId]).'">Individual</a>');
			?><br /><br />
		 	<?php if (!empty($sessionId)) { 
		 		echo('<a href="'.$this->url('result_view_session', ['userId' => $userId, 'sessionId' => $sessionId]).'">Session</a>');
				?><br />
				<?php } 
				} ?>

	<form method="GET">

	<label>Choisir un quiz</label><br />
		<select name="quizInput" value='1'>
		<?php $nbQuiz = count($quizTitle);
	 	for ($j=0; $j < $nbQuiz; $j++) {  if ($scores[$j]['scoreMoyen'] > 0.0) { ?>
			<option value="<?=$quizId[$j] ?>"><?=$quizTitle[$j] ?></option>
		<?php } ?>
		
		<?php } ?> </select>
		<button type="submit">Valider</button>
	</form>

<?php 
	if (!empty($_GET)) {
		 if (!empty($_GET['quizInput'])) {
			 $quizId = $_GET['quizInput']; 
echo('<a href="'.$this->url('result_view_quiz', ['quizId' => $quizId]).'">Quiz</a>');
			 }
		}
?>


<?php $this->stop('main_content') ?>

