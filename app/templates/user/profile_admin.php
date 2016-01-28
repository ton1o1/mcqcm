<?php $this->layout('admin_layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>
<div class="page">
    <div class="row">
       
        <h2>Zone admin</h2>
        <h3>Liste des profils</h3>
        <div class="panel panel-default">
        <!-- Default panel contents -->
             <!-- Table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                    </tr></thead>
                <?=$listProfil;?>

            </table>
        </div>
         <?=$listModals;?>
    </div>
</div>
<?php $this->stop('main_content') ?>
