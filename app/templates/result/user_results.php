<?php $this->layout('layout', ['title' => 'Résultats']) ?>

<?php $this->start('main_content') ?>

	<div class="page-header">
  		<h1>Résultats <small><?=$titleQu ?></small></h1>
	</div>

	<?php
	if($noteQuiz >= 50){
		$color = 'success';
		$icon = 'ok';
	}
	else{
		$color = 'danger';
		$icon = 'remove';
	}
	?>

	<div class="panel panel-<?= $color ?>">
  		<div class="panel-heading">
    		<h3 class="panel-title"><span class="glyphicon glyphicon-<?= $icon ?>" aria-hidden="true"></span>Mon score</h3>
  		</div>
	  	<div class="panel-body text-center quiz-score">
    		<?=$noteQuiz ?> %
  		</div>
	</div>
	
	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>En détails</h3>
  		</div>
	  	<div class="panel-body">
    		<?php	

	foreach ($resultat as $kez => $valuz) { ?>
	
		<span>Pour la question <strong><?=$valuz["question_id"] ?></strong>, </span>

		<?php
		if (empty($resulTotTitle[$kez])) {$lenArray = 0;} else 
			{$lenArray = count($resulTotTitle[$kez]);}

		if ($lenArray == 0) {
			$note = 1;
			?><span style="color:green;"><strong> réponse exacte</strong></span>
			<?php } 
		else { ?><span style="color:red;"><strong> erreur(s)</strong></span><span> pour le(s) choix suivant(s) : </span> 
			<?php echo($resulTotTitle[$kez]); } ?>. 
		<br />
	<?php }  ?>
  		</div>
	</div>

<?php $this->stop('main_content') ?>