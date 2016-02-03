<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>


<?= !empty($alerts) ? $alerts : '' ?>

<div class="jumbotron">
 	<h1>On se fait un quiz ?</h1>
	<p>Dis-moi quelles sont tes compétences, et voyons ce que tu vaut vraiment !</p>
	
		<form method="get" action="<?= $this->url("quiz_search") ?>">
  		<div class="form-group select2fix">
				<div class="input-group select2-bootstrap-append">
					<select name="tags[]" id="skillSearch" class="form-control select2" multiple></select>
					<span class="input-group-btn">
						<button class="btn btn-default select2margin" type="submit" data-select2-open="multi-append">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</div>
		</form>
  	
</div>

<?php
if(!empty($quizzes)){
	echo '<div class="list-group">';
	                
	foreach($quizzes as $value){
		$url = $this->url('quiz_view', ['quizId' => $value['id'], 'quizSlug' => $value['title'][0]]);
		echo '<a href="'.$url.'" class="list-group-item" title="Consulter le quiz : '.$value['title'][1].'">'.$value['title'][1].'</a>';
	}

	echo '</div>';
}
?>

<?php $this->stop('main_content') ?>
