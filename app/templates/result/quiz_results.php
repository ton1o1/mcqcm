<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>

<form action="" method="POST" class="form-group" novalidate> 
	<fieldset> 
		<legend>Résultats au quiz</legend> 
		<h2></h2> 
		<p></p> 
		<div class="form-group"> 
			<label for="question-title">Résultats au quiz <?= $quizId ?></label> 
			<textarea name="questionTitle" id="question-title" rows="30" cols="200" disabled><?= $this->viewQuiz($quizId)?></textarea> 
		</div> 
			
		<h2>Scores généraux</h2> 
		 
		<div> 
			<label> 
				<? foreach ($quizList as $key => $value) { ?>
					<p><?= $quiz[0]['title'] ?></p> 
				<? if (!empty($quizId)) {
					$this->result->quizResult($quizId);}
					} ?>
			</label>
		</div>  
	</fieldset> 
</form> 




<?php $this->stop('main_content') ?>
