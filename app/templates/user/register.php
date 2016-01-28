<?php $this->layout('admin_layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
<div class="page page__identification <?= $class =(!empty($errormessage))?'animated shake page__identification--error':'';?>">
    <div class="row">
         <h2>Inscription</h2>
        <form action="" method="post" novalidate class="">
            <p class="form__indication">Tous les champs du formulaire sont obligatoires.</p>
            <div class="form-group <?php if(!empty($errormessage['userLastName'])){ echo 'has-error';}?>">
                <label for="userLastName">Nom <span class="required">*</span></label>
                <input type="text" class="form-control" id="userLastName" name="userLastName" placeholder="Nom" value="<?= $userLastName =(!empty($_POST['userLastName']))?$_POST['userLastName']:'';?>">
                <?= $userLastName =(!empty($errormessage['userLastName']))?$errormessage['userLastName']:'';?>
            </div>
            <div class="form-group <?php if(!empty($errormessage['userFirstName'])){ echo 'has-error';}?>">
                <label for="userFirstName">Prénom <span class="required">*</span></label>
                <input type="text" class="form-control" id="userFirstName" name="userFirstName" placeholder="Prénom" value="<?= $userFirstName =(!empty($_POST['userFirstName']))?$_POST['userFirstName']:'';?>">
                 <?= $userFirstName =(!empty($errormessage['userFirstName']))?$errormessage['userFirstName']:'';?>
            </div>
            <div class="form-group <?php if(!empty($errormessage['userEmail'])){ echo 'has-error';}?>">
                <label for="userEmail">Adresse e-mail <span class="required">*</span></label>
                <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Email" value="<?= $userEmail =(!empty($_POST['userEmail']))?$_POST['userEmail']:'';?>">
                 <?= $userEmail =(!empty($errormessage['userEmail']))?$errormessage['userEmail']:'';?>
            </div>
            <div class="form-group <?php if(!empty($errormessage['userPassword'])){ echo 'has-error';}?>">
                <label for="userPassword">Mot de passe <span class="required">*</span></label>
                <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password" value="">
                <?= $userPassword =(!empty($errormessage['userPassword']))?$errormessage['userPassword']:'';?>
            </div>
            <div class="form-group <?php if(!empty($errormessage['userPassword'])){ echo 'has-error';}?>">
                <label for="userPasswordConfirmed">Confirmer votre mot de passe <span class="required">*</span></label>
                <input type="password" class="form-control" id="userPasswordConfirmed" name="userPasswordConfirmed" placeholder="Password" value="">
            </div>
            <button type="submit" class="btn btn-default">Inscription</button>
        </form>
    </div>
</div>
<?php $this->stop('main_content') ?>
