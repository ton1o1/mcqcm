<?php $this->layout('layout', ['title' => 'Modification de profil']) ?>

<?php $this->start('main_content') ?>
<div class="page page__identification <?= $class =(!empty($errormessage))?'animated shake page__identification--error':'';?>">
    <div class="row">
         <h2>Modification de profil</h2>
         <!-- modify userInfos -->
           <h3>Vos données personnelles<button class="pull-right btn btn-info" role="button" data-toggle="collapse" href="#modifyUserInfo" aria-expanded="false" aria-controls="modifyUserInfo">Modifier</button></h3>
            <div class="collapse" id="modifyUserInfo">
                <form action="" method="post" novalidate class="">
                    <div class="form-group <?php if(!empty($errormessage['userLastName'])){ echo 'has-error';}?>">
                        <label for="userLastName">Nom <span class="required">*</span></label>
                        <input type="text" class="form-control" id="userLastName" name="userLastName" placeholder="Nom" value="<?= $userLastName =(!empty($_POST['userLastName']))?htmlspecialchars($_POST['userLastName']): htmlspecialchars($userData['last_name']);?>">
                        <?= $userLastName =(!empty($errormessage['userLastName']))?$errormessage['userLastName']:'';?>
                    </div>
                    <div class="form-group <?php if(!empty($errormessage['userFirstName'])){ echo 'has-error';}?>">
                        <label for="userFirstName">Prénom <span class="required">*</span></label>
                        <input type="text" class="form-control" id="userFirstName" name="userFirstName" placeholder="Prénom" value="<?= $userFirstName =(!empty($_POST['userFirstName']))?htmlspecialchars($_POST['userFirstName']):htmlspecialchars($userData['first_name']);?>">
                         <?= $userFirstName =(!empty($errormessage['userFirstName']))?$errormessage['userFirstName']:'';?>
                    </div>
                    <button type="submit" class="btn btn-default">Modification</button>
                </form>
            </div>
            <!-- modify password -->
       
            <h3>Votre mot de passe<button class="pull-right btn btn-info" role="button" data-toggle="collapse" href="#modifyPwd" aria-expanded="false" aria-controls="modifyPwd">Modifier</button></h3>
            <div class="collapse" id="modifyPwd">
                <form action="" method="post" novalidate class="">
                    <div class="form-group <?php if(!empty($errormessage['userPassword'])){ echo 'has-error';}?>">
                        <label for="userNewPassword">Mot de passe <span class="required">*</span></label>
                        <input type="password" class="form-control" id="userNewPassword" name="userNewPassword" placeholder="Password" value="">
                        <?= $userNewPassword =(!empty($errormessage['userNewPassword']))?$errormessage['userNewPassword']:'';?>
                    </div>
                    <div class="form-group <?php if(!empty($errormessage['userPassword'])){ echo 'has-error';}?>">
                        <label for="userPasswordConfirmed">Confirmer votre mot de passe <span class="required">*</span></label>
                        <input type="password" class="form-control" id="userPasswordConfirmed" name="userPasswordConfirmed" placeholder="Password" value="">
                    </div>
                    <button type="submit" class="btn btn-default">Modifier</button>
                </form>
            </div>
            <!-- modify email -->
            <h3 class="bg-primary">Votre email<button class="pull-right btn btn-info" role="button" data-toggle="collapse" href="#modifyEmail" aria-expanded="false" aria-controls="modifyEmail">Modifier</button></h3>
            <p>Votre adresse email est <?=$w_user['email'];?></p>
            <div class="collapse" id="modifyEmail">
                <form action="" method="post" novalidate class="">
                    <div class="form-group <?php if(!empty($errormessage['userEmail'])){ echo 'has-error';}?>">
                        <label for="userNewEmail">Nouvelle adresse email</label>
                        <input type="email" class="form-control" id="userNewEmail" name="userNewEmail" placeholder="email" value="">
                        <?= $userEmail =(!empty($errormessage['userNewEmail']))?$errormessage['userNewEmail']:'';?>
                    </div>
                    <div class="form-group <?php if(!empty($errormessage['userPassword'])){ echo 'has-error';}?>">
                        <label for="userPassword">Mot de passe actuel<span class="required">*</span></label>
                        <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Password" value="">
                        <?= $userPassword =(!empty($errormessage['userPassword']))?$errormessage['userPassword']:'';?>
                    </div>
                    <button type="submit" class="btn btn-default">Changer d'adressse Email</button>
                </form>
            </div>
    </div>
</div>
<?php $this->stop('main_content') ?>
