<?php $this->layout('layout', ['title' => 'Quizzes du moment']) ?>

<?php $this->start('main_content') ?>

	<div class="page-header">
		<a class="btn btn-success pull-right" href="<?= $this->url('quiz_create') ?>" title="Créer un nouveau quiz" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Créer un quiz</a>
  		<h1>Mes quizzes</h1>
	</div>

	<?= !empty($alerts) ? $alerts : '' ?>

<?php
if(!empty($quizzes)){
	
	foreach($quizzes as $value){
		$url = $this->url('quiz_view', ['quizId' => $value['id'], 'quizSlug' => $value['title'][0]]);
		echo '
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="btn-group pull-left" role="group" aria-label="Options du quiz">
  					<a href="' . $url . '" role="button" class="btn btn-default" title="Consulter le quiz : '.$value['title'][1].'" title="Consulter le quiz : '.$value['title'][1].'"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Voir</a>
  					<a href="' . $this->url('quiz_edit', ['quizId' => $value['id']]) . '" role="button" class="btn btn-primary" title="Editer le quiz : '.$value['title'][1].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Editer</a>
				</div>
				<h5 class="quiz-title pull-left"> '.$value['title'][1].'</h5>
			</div>
		</div>';
	}

}
else{
	echo '<div class="alert alert-info" role="alert">Vous n\'avez créé aucun quiz.</div>';
}
?>

<?php $this->stop('main_content') ?>

<?php $this->start('scripts') ?>

<?php $this->stop('scripts') ?>
