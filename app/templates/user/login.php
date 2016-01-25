<?php $this->layout('admin_layout', ['title' => 'Identification']) ?>

<?php $this->start('main_content') ?>
<div class="page page__identification">
    <div class="row">
        <h2>Identification</h2>
        <form action="" method="post" novalidate>
            <div class="form-group">
                <label for="user_email" class="control-label">Adresse e-mail</label>
                <input type="email" class="form-control" id="user_email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="user_password">Mot de passe</label>
                <input type="password" class="form-control" id="user_password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Connexion</button>
        </form>
        <a class="link" href="nouveau-compte/">créer un nouvreau compte</a>
    </div>
</div>
<?php $this->stop('main_content') ?>
