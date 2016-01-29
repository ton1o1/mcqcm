<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<?= !empty($alerts) ? $alerts : '' ?>

<div class="jumbotron">
 	<h1>On se fait un quiz ?</h1>
	<p>Dis-moi quelles sont tes compétences, et voyons ce que tu vaut vraiment !</p>
	
		<!-- <div class="input-group select2-bootstrap-append">
  			<select id="skillSearch" class="form-control select2 select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true"></select>
  			<span class="input-group-btn">
				<button class="btn btn-default" data-select2-open="multi-append" type="button">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</span>
  		</div> -->
  		<form method="post" action="<?= $this->url("quiz_search") ?>">
  		<div class="form-group select2fix">
				<div class="input-group select2-bootstrap-append">
					<select id="skillSearch" class="form-control select2" multiple></select>
					<span class="input-group-btn">
						<button class="btn btn-default select2margin" type="submit" data-select2-open="multi-append">
							<span class="glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
			</div>
		</form>
  	
</div>

<?= !empty($html) ? $html : '' ?>

<?php $this->stop('main_content') ?>
