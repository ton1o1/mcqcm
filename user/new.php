<?php $this->layout('admin_layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>
<div class="page page__identification">
    <div class="row">
       
        <form action="" method="post">
            <div class="form-title">Inscription</div>
            <div class="form-group">
                <label for="user_email">Nom</label>
                <input type="email" class="form-control" id="user_email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="user_email">Prénom</label>
                <input type="email" class="form-control" id="user_email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="user_email">Adresse e-mail</label>
                <input type="email" class="form-control" id="user_email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="user_password">Mot de passe</label>
                <input type="password" class="form-control" id="user_password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="user_password">Confirmer votre mot de passe</label>
                <input type="password" class="form-control" id="user_password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Inscription</button>
        </form>
    </div>
</div>
<?php $this->stop('main_content') ?>
