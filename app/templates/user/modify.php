<?php $this->layout('admin_layout', ['title' => 'Modification de profil']) ?>

<?php $this->start('main_content') ?>
<div class="page page__identification <?= $class =(!empty($errormessage))?'animated shake page__identification--error':'';?>">
    <div class="row">
         <h2>Modification de profil</h2>
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
</div>
<?php $this->stop('main_content') ?>
