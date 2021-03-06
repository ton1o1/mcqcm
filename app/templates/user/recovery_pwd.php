<?php $this->layout('layout', ['title' => 'Retrouver votre mot de passe']) ?>

<?php $this->start('main_content') ?>
<div class="jumbotron visuel">
         <h2>Vous souhaitez retrouver votre mot de passe</h2>
</div>
<div class="page page__identification <?= $class =(!empty($errormessage))?'animated shake page__identification--error':'';?>">
    <div class="row">
        <?= $messageInfo = (!empty($messageInfo)) ? $messageInfo : '';?>
        <form action="" method="post" novalidate class="<?php if(!empty($messageInfo)){ echo 'is-hidden';}?>">
           <div class="form-group <?php if(!empty($errormessage['userEmail'])){ echo 'has-error';}?>">
                <label for="userEmail">Votre email <span class="required">*</span></label>
                <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="email" value="<?= $userEmail =(!empty($_POST['userEmail']))?$_POST['userEmail']:'';?>">
                 <?= $userEmail =(!empty($errormessage['userEmail']))?$errormessage['userEmail']:'';?>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default" name="submit" value="Retrouver" />
            </div>
        </form>
    </div>
</div>
<?php $this->stop('main_content') ?>
