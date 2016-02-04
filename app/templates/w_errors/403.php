<?php $this->layout('layout', ['title' => 'Accès refusé']) ?>

<?php $this->start('main_content'); ?>
<div id="block-error">
    <div>
		<h2>Accès refusé</h2>
    <p>
    	Vous n'avez pas les droits pour accéder à cette page !
    </p>
    <p>
    	Pour retrouver votre chemin, vous pouvez <a href="<?= $this->url("home") ?>" title="Retour à l'accueil">retourner à la page d'accueil</a> ou utiliser le formulaire de recherche dans le menu de navigation en haut de page.
    </p>
    </div>
</div>
<?php $this->stop('main_content'); ?>
