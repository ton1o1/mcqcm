<?php $this->layout('layout', ['title' => 'Données pour résultats']) ?>

<?php $this->start('main_content') ?>


	<h2>Résultats</h2>
	
	<p><strong><u>Résultats généraux</u></strong></p>
	<?php $nbQuiz = count($quizTitle);
	for ($i=0; $i < $nbQuiz; $i++) { 
		if ($scores[$i]['scoreMoyen'] > 0.0) {
			?><div>Note moyenne (sur 100) de : <strong><?=number_format($scores[$i]['scoreMoyen'],2) ?></strong> et écart-type de : <strong><?=number_format($scores[$i]['ecartType'],2) ?></strong> pour le quiz <strong><?=$quizTitle[$i] ?></strong>.</div>
			<?php }
		} ?>

		<br /><br /><br />

		<div><strong><u>Résultats individuels</u></strong></div><br />
		<?php 
		if (!empty($userId)) { 
			echo('<a href="'.$this->url('result_view_individual', ['userId' => $userId]).'">Vos scores enregistrés</a>');
			?><br /><br />
		 	<?php if (!empty($sessionId)) { 
		 		echo('<a href="'.$this->url('result_view_session', ['userId' => $userId, 'sessionId' => $sessionId]).'">Vos résultats à la session</a>');
				?><br /><br />
				<?php } 
				} ?>

	<p><strong><u>Résultats détaillés</u></strong></p>

	<form method="GET">

		<label><strong>Choisir un quiz</strong></label><br />
		<select name="quizInput" value='1'>
			<?php $nbQuiz = count($quizTitle);
		 	for ($j=0; $j < $nbQuiz; $j++) {  if ($scores[$j]['scoreMoyen'] > 0.0) { ?>
				<option value="<?=$quizId[$j] ?>"><?=$quizTitle[$j] ?></option>
			<?php } ?>
			
		<?php } ?> </select>
		<button type="submit">Valider</button>

	</form>

<br />

<?php 
	if (!empty($_GET)) {
		 if (!empty($_GET['quizInput'])) {
			$quizId = $_GET['quizInput']; 
			echo('<a href="'.$this->url('result_view_quiz', ['quizId' => $quizId]).'">Résultats à ce quiz</a>');
			}
		}

?>

<?php $this->stop('main_content') ?>