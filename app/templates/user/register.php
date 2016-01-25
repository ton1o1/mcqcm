<?php $this->layout('admin_layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
<div class="page page__identification <?= $class =(!empty($errormessage))?'animated shake page__identification--error':'';?>">
    <div class="row">
            <?php if(!empty($errormessage)){
            print_r($errormessage);

            }?>

        <form action="" method="post" novalidate >
            <div class="form-title">Inscription</div>
            <div class="form-group">
                <label for="userName">Nom</label>
                <input type="text" class="form-control" id="userName" name="userLastName" placeholder="Nom" value="<?= $userLastName =(!empty($_POST['userLastName']))?$_POST['userLastName']:'';?>">
            </div>
            <div class="form-group">
                <label for="userSurName">Prénom</label>
                <input type="text" class="form-control" id="userSurName" name="userFirstName" placeholder="Prénom" value="<?= $userFirstName =(!empty($_POST['userFirstName']))?$_POST['userFirstName']:'';?>">
            </div>
            <div class="form-group">
                <label for="userEmail">Adresse e-mail</label>
                <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Email" value="<?= $userEmail =(!empty($_POST['userEmail']))?$_POST['userEmail']:'';?>">
            </div>
            <div class="form-group">
                <label for="userPassword">Mot de passe</label>
                <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password" value="<?= $userPassword =(!empty($_POST['userPassword']))?$_POST['userPassword']:'';?>">
            </div>
            <div class="form-group">
                <label for="userPasswordConfirmed">Confirmer votre mot de passe</label>
                <input type="password" class="form-control" id="userPasswordConfirmed" name="userPasswordConfirmed" placeholder="Password" value="<?= $userPasswordConfirmed =(!empty($_POST['userPasswordConfirmed']))?$_POST['userPasswordConfirmed']:'';?>">
            </div>
            <button type="submit" class="btn btn-default">Inscription</button>
        </form>
    </div>
</div>
<?php $this->stop('main_content') ?>
