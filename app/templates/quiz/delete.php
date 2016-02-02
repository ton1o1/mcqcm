<?php $this->layout('layout', ['title' => 'Supprimer un quiz']) ?>

<?php $this->start('main_content') ?>

    <div class="page-header">
  		<h1>Supprimer un quiz</h1>
	</div>

    <?= !empty($alerts) ? $alerts : '' ?>

    <p>Etes-vous sûr de vouloir supprimer le quiz "<?=$quiz['title']?>" ?</p>

    <form method="post">
        <input type="checkbox" name="sure" id="sure" value="1" />
        <label for="sure">Oui, je confirme la suppression</label>

        <button type="submit" name="quiz[submit]" value="1" class="btn btn-danger pull-right">Supprimer</button>
    </form>
    
<?php $this->stop('main_content') ?>
