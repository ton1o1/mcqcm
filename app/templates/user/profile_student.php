<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>
<div class="page">
    <div class="row">
       
        <h2>Votre Profil</h2>
        <p>Retrouvez vos quizz et modifez vos données personnelles depuis cette page.</p>

        <a class="btn btn-default" href="<?= $this->url("user_modify", []);?>">Modifier mon profil</a>
    </div>
</div>
<?php $this->stop('main_content') ?>
