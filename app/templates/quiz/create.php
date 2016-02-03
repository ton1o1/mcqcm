<?php $this->layout('layout', ['title' => 'Créer un quiz']) ?>

<?php $this->start('main_content') ?>

	<div class="page-header">
  		<h1>Créer un quiz <small>1/2</small></h1>
	</div>

	<?= !empty($alerts) ? $alerts : '' ?>

	<form class="form-horizontal" method="post">
  <div class="form-group<?= !empty($errors['title']) ? ' has-error' : '' ?>">
    <label for="title" class="col-sm-2 control-label">Nom du quiz</label>
    <div class="col-sm-10">
      <input type="text" name="quiz[title]" class="form-control" id="title" placeholder="Ex: PHP orienté objet, frameworks et modèle MVC" value="<?= !empty($data['title']) ? $data['title'] : '' ?>" />
      <?= !empty($errors['title']) ? '<p class="text-danger">' . $errors['title'] . '</p>' : '' ?>
    </div>
  </div>
  <div class="form-group<?= !empty($errors['description']) ? ' has-error' : '' ?>">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea name="quiz[description]" class="form-control" rows="4" id="description" placeholder="Ex: Ce quiz s'adresse aux développeurs souhaitant valider leurs compétences en PHP orienté objet et leur maîtrise du modèle MVC. Il intègre également une approche basique du fonctionnement global des frameworks PHP."><?= !empty($data['description']) ? $data['description'] : '' ?></textarea>
      <?= !empty($errors['description']) ? '<p class="text-danger">' . $errors['description'] . '</p>' : '' ?>
    </div>
  </div>
  <div class="form-group<?= !empty($errors['skills']) ? ' has-error' : '' ?>">
    <label for="skillSearchAdd" class="col-sm-2 control-label">Compétences visées</label>
    <div class="col-sm-10 select2fix">
    <select name="quiz[skills][]" id="skillSearchAdd" class="form-control" multiple>
        <?php
        if(!empty($data['skills'])){
            foreach($data['skills'] as $tag){
                $tag = explode('|', $tag);
                $tagId = $tag[0];
                $tagLabel = $tag[1];
                echo '<option value="'.$tagId.'|'.$tagLabel.'" text="'.$tagLabel.'" selected="selected">'.$tagLabel.'</option>';
            }
        }
        ?>
    </select>
      <?= !empty($errors['skills']) ? '<p class="text-danger">' . $errors['skills'] . '</p>' : '' ?>
    </div>
  </div>
  <div class="form-group pull-right">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="quiz[submit]" value="1" class="btn btn-primary">Etape 2 <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>
    </div>
  </div>
</form>

<?php $this->stop('main_content') ?>

<?php $this->start('scripts') ?>

<script>
$(function() {

    // Skills search
    $("#skillSearchAdd").select2({
        theme: "bootstrap",
        language: "fr",
        placeholder: "Saisir un ou plusieurs mots clés de compétences.",
        multiple: true,
        ajax: {
            method: "POST",
          url: "<?= $this->url('skill_search') ?>",
          dataType: "json",
          delay: 250,
          data: function (params) {
            return {
              q: params.term, // search term
              page: params.page,
              source: 'creator'
            };
          },
          processResults: function (data, params) {
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            params.page = params.page || 1;

            return {
              results: data.results,
              pagination: {
                more: (params.page * 30) < data.total
              }
            };
          },
          cache: true
        },
        escapeMarkup: function (markup) {
          return markup; // let our custom formatter work
        },
        minimumInputLength: 2,
        templateResult: function(skill) {
          if(skill.new){
            return "Aucun résultat pour le tag exact \"" + skill.tag + "\", cliquez pour le créer";
            }
            else{
            return skill.tag;
            }
        },
        templateSelection: function(skill) {
          if(skill.tag){
            return skill.tag;
          }
          else{
            return skill.text;
          }
        }
    });
});
</script>

<?php $this->stop('scripts') ?>
