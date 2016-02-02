<?php $this->layout('layout', ['title' => 'Modification de votre mot de passe']) ?>
<?php $this->start('main_content') ?>
<div class="page page__identification <?= $class =(!empty($errormessage))?'animated shake page__identification--error':'';?>">
    <div class="row">
         <h2>Modification de votre mot de passe</h2>
        <form action="" method="post" novalidate class="">
           
           <div class="form-group <?php if(!empty($errormessage['userPassword'])){ echo 'has-error';}?>">
                <label for="userPassword">Mot de passe <span class="required">*</span></label>
                <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password" value="">
                 <?= $userPassword =(!empty($errormessage['userPassword']))?$errormessage['userPassword']:'';?>
            </div>
            <div class="form-group <?php if(!empty($errormessage['userPassword'])){ echo 'has-error';}?>">
                <label for="userPasswordConfirmed">Confirmer votre mot de passe <span class="required">*</span></label>
                <input type="password" class="form-control" id="userPasswordConfirmed" name="userPasswordConfirmed" placeholder="Password" value="">
            </div>
            <button type="submit" class="btn btn-default">Modification</button>
        </form>
    </div>
</div>
<?php $this->stop('main_content') ?>
