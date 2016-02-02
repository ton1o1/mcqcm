<?php $this->layout('layout', ['title' => 'Quizzes du moment']) ?>

<?php $this->start('main_content') ?>

	<div class="page-header">
  		<h1>Quizzes du moment</h1>
	</div>

	<?= !empty($alerts) ? $alerts : '' ?>

<?php
if(!empty($quizzes)){
	echo '<div class="list-group">';
	                
	foreach($quizzes as $value){
		$url = $this->url('quiz_view', ['quizId' => $value['id'], 'quizSlug' => $value['title'][0]]);
		echo '<a href="'.$url.'" class="list-group-item" title="Consulter le quiz : '.$value['title'][1].'">'.$value['title'][1].'</a>';
	}

	echo '</div>';
}
else{
	echo '<div class="alert alert-info" role="alert">Aucun quiz actif actuellement.</div>';
}
?>

<?php $this->stop('main_content') ?>

<?php $this->start('scripts') ?>

<?php $this->stop('scripts') ?>
