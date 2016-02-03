<?php $this->layout('layout', ['title' => 'Modification de profil']) ?>
<?php $this->start('main_content') ?>
<div class="page page__identification <?= $class =(!empty($errormessage))?'animated shake page__identification--error':'';?>">
    <div class="row">

        <h2><span class="glyphicon glyphicon-cog"></span>Modification de profil</h2>
        <!-- modify userInfos -->
        <p>Vous pouvez modifier l'intégralité de vos données</p>
        <div class="panel panel-default">
            <div class="panel-heading">
            <h3><span class="glyphicon glyphicon-user"></span>Vos données personnelles<button class="pull-right btn btn-info" role="button" data-toggle="collapse" href="#modifyUserInfo" aria-expanded="false" aria-controls="modifyUserInfo"><span class="glyphicon glyphicon-chevron-down"></span> Modifier</button></h3>
            </div>
            <div class="panel-body collapse<?= $modifyUserInfo =(!empty($errormessage['modifyUserInfo']))?' in':'';?>" id="modifyUserInfo">
                <form action="" method="post" novalidate class="">
                    <div class="form-group <?php if(!empty($errormessage['userLastName'])){ echo 'has-error';}?>">
                        <label for="userLastName">Nom <span class="required">*</span></label>
                        <input type="text" class="form-control" id="userLastName" name="userLastName" placeholder="Nom" value="<?= $userLastName =(!empty($_POST['userLastName']))?htmlspecialchars($_POST['userLastName']): htmlspecialchars($w_user['last_name']);?>">
                        <?= $userLastName =(!empty($errormessage['userLastName']))?$errormessage['userLastName']:'';?>
                    </div>
                    <div class="form-group <?php if(!empty($errormessage['userFirstName'])){ echo 'has-error';}?>">
                        <label for="userFirstName">Prénom <span class="required">*</span></label>
                        <input type="text" class="form-control" id="userFirstName" name="userFirstName" placeholder="Prénom" value="<?= $userFirstName =(!empty($_POST['userFirstName']))?htmlspecialchars($_POST['userFirstName']):htmlspecialchars($w_user['first_name']);?>">
                         <?= $userFirstName =(!empty($errormessage['userFirstName']))?$errormessage['userFirstName']:'';?>
                    </div>
                    <button type="submit" class="btn btn-default">Enregistrer</button>
                </form>
            </div>
        </div>
            <!-- modify password -->
        <div class="panel panel-default">
             <div class="panel-heading">
            <h3><span class="glyphicon glyphicon-eye-close"></span> Votre mot de passe<button class="pull-right btn btn-info" role="button" data-toggle="collapse" href="#modifyPassword" aria-expanded="false" aria-controls="modifyPassword"><span class="glyphicon glyphicon-chevron-down"></span> Modifier</button></h3>
            </div>
            <div class="panel-body collapse<?= $modifyPassword =(!empty($errormessage['modifyPassword']))?' in':'';?>" id="modifyPassword">
                <form action="" method="post" novalidate class="">
                    <div class="form-group <?php if(!empty($errormessage['userPasswordModify'])){ echo 'has-error';}?>">
                        <label for="userPasswordModify">Mot de passe actuel<span class="required">*</span></label>
                        <input type="password" class="form-control" id="userPasswordModify" name="userPasswordModify" placeholder="Password" value="">
                        <?= $userPasswordModify =(!empty($errormessage['userPasswordModify']))?$errormessage['userPasswordModify']:'';?>
                    </div>
                    <div class="form-group <?php if(!empty($errormessage['userNewPassword'])){ echo 'has-error';}?>">
                        <label for="userNewPassword">Nouveau mot de passe <span class="required">*</span></label>
                        <input type="password" class="form-control" id="userNewPassword" name="userNewPassword" placeholder="Password" value="">
                        <span id="helpBlock" class="help-block">Quatre caractères minimum.</span>
                         <?= $userNewPassword =(!empty($errormessage['userNewPassword']))?$errormessage['userNewPassword']:'';?>
                    </div>
                    <button type="submit" class="btn btn-default">Enregistrer</button>
                </form>
            </div>
        </div>
            <!-- modify email -->
        <div class="panel panel-default">
            <div class="panel-heading">      
                <h3><span class="glyphicon glyphicon-send"></span>Votre email<button class="pull-right btn btn-info" role="button" data-toggle="collapse" href="#modifyEmail" aria-expanded="false" aria-controls="modifyEmail"><span class="glyphicon glyphicon-chevron-down"></span> Modifier</button></h3>
            </div>
            <div class="panel-body">
                <p>Votre adresse email est <?=$w_user['email'];?></p>
                <div class="collapse<?= $modifyEmail =(!empty($errormessage['modifyEmail']))?' in':'';?>" id="modifyEmail">
                    <form action="" method="post" novalidate class="">
                        <div class="form-group <?php if(!empty($errormessage['userEmailModify'])){ echo 'has-error';}?>">
                            <label for="userEmailModify">Nouvelle adresse email</label>
                            <input type="email" class="form-control" id="userEmailModify" name="userEmailModify" placeholder="email" value="<?= $userEmailModify =(!empty($_POST['userEmailModify']))? $_POST['userEmailModify'] : '';?>">
                            <?= $userEmailModify =(!empty($errormessage['userEmailModify']))?$errormessage['userEmailModify']:'';?>
                        </div>
                        <div class="form-group <?php if(!empty($errormessage['userPasswordConfirme'])){ echo 'has-error';}?>">
                            <label for="userPasswordConfirme">Mot de passe actuel<span class="required">*</span></label>
                            <input type="password" class="form-control" id="userPasswordConfirme" name="userPasswordConfirme" placeholder="Password" value="">

                            <?= $userPasswordConfirme =(!empty($errormessage['userPasswordConfirme']))?$errormessage['userPasswordConfirme']:'';?>
                        </div>
                        <button type="submit" class="btn btn-default">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop('main_content') ?>
