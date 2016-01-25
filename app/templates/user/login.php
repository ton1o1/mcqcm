<?php $this->layout('admin_layout', ['title' => 'Identification']) ?>

<?php $this->start('main_content') ?>
<div class="page page__identification <?= $class =(!empty($errormessage))?'animated shake page__identification--error':'';?>">
    <div class="row">
        <h2>Identification</h2>
        <?php

             if(!empty($errormessage)){
            print_r($errormessage);

            }?>
        <form action="" method="post" novalidate class="">
            <div class="form-group">
                <label for="userEmail" class="control-label">Adresse e-mail</label>
                <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Email" value="<?= $userEmail =(!empty($_POST['userEmail']))?$_POST['userEmail']:'';?>">
            </div>
            <div class="form-group">
                <label for="userPassword">Mot de passe</label>
                <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="Password" value="<?= $userPassword =(!empty($_POST['userPassword']))?$_POST['userPassword']:'';?>">
            </div>
            <div class="form-group">
                <div class="controls">
                    <input type="submit" class="btn btn-default" value="Connexion"/>
                </div>
            </div>
        </form>
        <a class="link" href="../inscription/">créer un nouvreau compte</a>
    </div>
</div>

<?php $this->stop('main_content') ?>
