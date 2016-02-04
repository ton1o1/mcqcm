<?php $this->layout('layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>
<div class="jumbotron visuel">
        <h2>Votre Profil</h2>
        <p>Retrouvez vos quizz et modifez vos données personnelles depuis cette page.</p>
</div>

<div class="page">
    <div class="row">
        <?php if(!empty($_SESSION['messageInfo'])){ echo $_SESSION['messageInfo']; unset($_SESSION['messageInfo']);}?>

        <a class="btn btn-default" href="<?= $this->url("user_modify", []);?>">Modifier mon profil</a>
        <a class="btn btn-default" href="<?= $this->url("quiz_view_user",[]);?>">Accéder à mes quiz</a>
    </div>
</div>
<?php $this->stop('main_content') ?>
