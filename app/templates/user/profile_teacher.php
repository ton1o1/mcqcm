<?php $this->layout('admin_layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>
<div class="page page__identification">
    <div class="row">
       
        <h2>Zone TEACHER</h2>
        <p><?php print_r($_SESSION);?></p>
    </div>
</div>
<?php $this->stop('main_content') ?>
