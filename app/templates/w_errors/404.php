<?php $this->layout('layout', ['title' => 'Perdu ?']) ?>

<?php $this->start('main_content'); ?>
<div id="block_error">
    <div>
		<h2>Vous êtes perdu ?</h2>
    <p>
    	Nous n'avons pas trouvé la page que vous avez demandé.
    </p>
    <p>
    	Pour retrouver votre chemin, vous pouvez <a href="<?= $this->url("home") ?>" title="Retour à l'accueil">retourner à la page d'accueil</a> ou utiliser le formulaire de recherche dans le menu de navigation en haut de page.
    </p>
    </div>
</div>
<?php $this->stop('main_content'); ?>
