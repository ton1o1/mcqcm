<?php $this->layout('admin_layout', ['title' => 'Identification']) ?>

<?php $this->start('main_content') ?>
<div class="page page__identification <?= $class =(!empty($errormessage))?'animated shake page__identification--error':'';?>">
    <div class="row">
        <h2>Identification</h2>
        <form action="" method="post" novalidate class="<?php if(!empty($errormessage)){ echo 'has-error';}?>">
            <div class="form-group">
                <label for="userEmail" class="control-label">Adresse e-mail <span class="required">*</span></label>
                <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Email" value="<?= $userEmail =(!empty($_POST['userEmail']))?$_POST['userEmail']:'';?>">
            </div>
            <div class="form-group">
                <label for="userPassword">Mot de passe <span class="required">*</span></label>
                <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="Password" value="">
            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me" name="remember"> Rester connecté
              </label>
               <a class="pull-right link" href="<?= $this->url("user_recovery_pwd", []);?>">Mot de pass oublié ?</a>
            </div>

            <div class="form-group">
                <div class="controls">
                    <input type="submit" class="btn btn-default" value="Connexion"/>
                </div>
            </div>
            
        </form>
        <a class="link" href="<?= $this->url("user_register", []);?>">créer un nouvreau compte</a>
    </div>
</div>
<?php $this->stop('main_content') ?>
