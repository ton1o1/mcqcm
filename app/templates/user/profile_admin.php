<?php $this->layout('admin_layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>
<div class="page">
    <div class="row">

        <h2>Zone admin</h2>
        <!-- Search Form -->
        <h3>Recherche</h3>
        
        <form action="/administrator/search/" method="POST" id="searchUserForm">
            <label for="searchUser">Recherche</label>
            <div class="input-group">

                <input type="text" class="form-control" name="searchUser" id="searchUser" value="" placeholder="email, nom ou prénom de">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" value="rechercher">
                </span>
            </div>
        </form>
        <!-- Search Results -->
        <div class="user-result"></div>

        <h3>Liste des profils</h3>
        <!-- User list -->
        <div class="panel panel-default">
            <table class="table table-hover" id="user-table" >
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <?=$listProfil;?>
            </table>
        </div>
        <?=$listModals;?>
    </div>
</div>


<div id="usermodal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Gestion de l'état du compte</h4>
            </div>
            <div class="modal-body">
                <p id="usermodal__userName"></p>
            </div>
            <div class="modal-footer">
                <form action="/administrator/set-user-status/" method="POST">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="user_modal__button"></button>
                    <input type="hidden" name="userStatus" id="user_modal__userStatus" value ="">
                    <input type="hidden" name="userId" id="user_modal__userId" value ="">
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $this->stop('main_content') ?>
