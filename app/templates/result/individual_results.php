<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>

<form action="" method="POST" class="form-group" novalidate> 
	<fieldset> 
		<legend>Résultats</legend> 
		<h2></h2> 
		<p></p> 
		<div> 

				<label for="question-title">Résultats individuels de <?= $userId ?> pour la session <?= $sessionId ?></label> 
				<textarea name="questionTitle" id="question-title" rows="30" cols="200" disabled><?= $this->viewUser($userId, $sessionId)?></textarea> 
			</div> 
			<h2>Scores</h2> 
			 
		<div> 
			<label class="checkbox-inline"> 
				<? foreach ($quizList as $key => $value) { ?>
					<p><?= $quiz[0]['title'] ?></p> 
				<? if (!empty($quizId)) {
					$this->result->quizResult($quizId);}
					} ?>
 			
 			 
 		</div> 
 	</fieldset> 
 </form> 




<?php $this->stop('main_content') ?>
