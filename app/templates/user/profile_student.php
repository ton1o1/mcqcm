<?php $this->layout('admin_layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>
<div class="page">
    <div class="row">
       
        <h2>Zone STUDENT</h2>
        <p><?php print_r($_SESSION);?></p>

        <a href="<?= $this->url("user_modify", []);?>">Modifier mon profil</a>
    </div>
</div>
<?php $this->stop('main_content') ?>
