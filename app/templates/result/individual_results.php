<?php $this->layout('layout', ['title' => 'Mes résultats']) ?>

<?php $this->start('main_content') ?>

	<div class="page-header">
  		<h1>Mes résultats</h1>
	</div>
	
	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Statistiques</h3>
  		</div>
	  	<div class="panel-body">
    		Note moyenne (sur 100) : <strong><?=number_format($resultsStu['scoreMoyen'],2) ?></strong><br />
    		Ecart-type : <strong><?=number_format($resultsStu['ecartType'],2) ?></strong>
  		</div>
	</div>

	<div class="list-group">
		<?php foreach($userRes as $value) { 
			if($value['score'] >= 70){
				$color = 'success';
			}
			elseif($value['score'] >= 50){
				$color = 'warning';
			}
			else{
				$color = 'danger';
			}
		
			echo '<a href="'.$this->url('result_view_session', ['userId' => $w_user['id'], 'sessionId' => $value['sessionId']]).'" class="list-group-item"><span class="label label-'.$color.'">'.$value['score'].' %</span>'.$value['quizTitle'].'</a>';
		}
		?>
	</div>

<?php $this->stop('main_content') ?>
