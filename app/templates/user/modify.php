<?php $this->layout('admin_layout', ['title' => 'Modification de profil']) ?>

<?php $this->start('main_content') ?>
<div class="page page__identification <?= $class =(!empty($errormessage))?'animated shake page__identification--error':'';?>">
    <div class="row">
         <h2>Modification de profil</h2>
        <form action="" method="post" novalidate class="">
           
            <div class="form-group <?php if(!empty($errormessage['userName'])){ echo 'has-error';}?>">
                <label for="userName">Nom <span class="required">*</span></label>
                <input type="text" class="form-control" id="userName" name="userLastName" placeholder="Nom" value="<?= $userLastName =(!empty($_POST['userLastName']))?$_POST['userLastName']: $userData['last_name'];?>">
            </div>
            <div class="form-group <?php if(!empty($errormessage['userSurName'])){ echo 'has-error';}?>">
                <label for="userSurName">Prénom <span class="required">*</span></label>
                <input type="text" class="form-control" id="userSurName" name="userFirstName" placeholder="Prénom" value="<?= $userFirstName =(!empty($_POST['userFirstName']))?$_POST['userFirstName']:$userData['first_name'];?>">
            </div>
            <div class="form-group <?php if(!empty($errormessage['userEmail'])){ echo 'has-error';}?>">
                <label for="userEmail">Adresse e-mail <span class="required">*</span></label>
                <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Email" value="<?= $userEmail =(!empty($_POST['userEmail']))?$_POST['userEmail']:$userData['email'];?>">
            </div>
            <div class="form-group <?php if(!empty($errormessage['userPassword'])){ echo 'has-error';}?>">
                <label for="userPassword">Mot de passe <span class="required">*</span></label>
                <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password" value="<?= $userPassword =(!empty($_POST['userPassword']))?$_POST['userPassword']:'';?>">
            </div>
            <div class="form-group <?php if(!empty($errormessage['userPassword'])){ echo 'has-error';}?>">
                <label for="userPasswordConfirmed">Confirmer votre mot de passe <span class="required">*</span></label>
                <input type="password" class="form-control" id="userPasswordConfirmed" name="userPasswordConfirmed" placeholder="Password" value="<?= $userPasswordConfirmed =(!empty($_POST['userPasswordConfirmed']))?$_POST['userPasswordConfirmed']:'';?>">
            </div>
            <button type="submit" class="btn btn-default">Modification</button>
        </form>
    </div>
</div>
<?php $this->stop('main_content') ?>
