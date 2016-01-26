<?php $this->layout('layout', ['title' => 'Supprimer un quiz']) ?>

<?php $this->start('main_content') ?>

    <h2>Supprimer un quiz</h2>

    <?= !empty($alerts) ? $alerts : '' ?>

    <p>Etes-vous sûr de vouloir supprimer le quiz "<?=$data['title']?>" ?</p>

    <form method="POST">
        <input type="checkbox" name="sure" id="sure" value="1" />
        <label for="sure">Oui, je confirme la suppression</label>

        <button type="submit">Supprimer</button>
    </form>
    
<?php $this->stop('main_content') ?>
