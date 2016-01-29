<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<div class="jumbotron">
  <h1>On se fait un quiz ?</h1>
  <p>Dis-moi quelles sont tes compétences, et voyons ce que tu vaut vraiment !</p>
  <p><select id="skillSearch" multiple></select></p>
  <p class="right"><a class="btn btn-primary btn-lg" href="#" role="button">C'est parti !</a></p>
  <div class="clearfix"></div>
</div>

<?php $this->stop('main_content') ?>
