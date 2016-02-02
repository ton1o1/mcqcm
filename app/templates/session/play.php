<?php $this->layout('layout', ['title' => $play['quizTitle']]) ?>

<?php $this->start('main_content') ?>

    <div class="page-header">
        <h1>
        <small class="pull-right"><span id="clock"></span></small>
        <?= $play['quizTitle'] ?>
      </h1>
    </div>

    <?= !empty($alerts) ? $alerts : '' ?>

    <?php
    $tabs =
    '<div class="panel panel-default">
        <div class="panel-heading">Naviguer dans les questions</div>
            <div class="panel-body">';

    $i = 1;
    foreach($play['questions'] as $question){
        $tabs .= '<a class="label label-info" role="button" title="Afficher la question '.$i.'">'.$i.'</a>';
        $i++;
    }
  
    $tabs .= '
            <hr>Légende :&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-info">&nbsp;&nbsp;</span>non répondu&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-primary">&nbsp;&nbsp;</span>répondu&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-warning">&nbsp;&nbsp;</span>marquée à revoir
        </div>
    </div>';
    ?>

    <?= $tabs ?>

    Question 1 / <?= count($play['questions']) ?>
    
<?php $this->stop('main_content') ?>

<?php $this->start('scripts') ?>

    <script src="<?= $this->assetUrl('js/jquery.countdown.min.js') ?>"></script>
    <script>
    var t = "<?= $play['dateStart'] ?>".split(/[- :]/);
    var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
    $('#clock').countdown(d, {elapse: true});
    </script>

<?php $this->stop('scripts') ?>
