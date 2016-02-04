<?php $this->layout('admin_layout', ['title' => 'Profil']) ?>

<?php $this->start('main_content') ?>
    <div class="jumbotron visuel">
            <h2>Zone d'administration</h2>
            <!-- Search Form -->
    </div>
<div class="page">
    <div class="row">
        <h3>Recherche</h3>
        
        <form action="<?= $this->url('administrator_profile');?>search" method="POST" id="searchUserForm" class="searchUserForm">
            <label for="searchUser">Recherche</label>
            <div class="input-group">

                <input type="text" class="form-control" name="searchUser" id="searchUser" value="" placeholder="email, nom ou prénom de">
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-default" value="rechercher">
                </span>
            </div>
        </form>
        <!-- Search Results -->
        <div id="userResult" class="user-result" data-url="<?= $this->url('administrator_profile');?>"></div>

        
        <!-- User list -->
        <div class="panel panel-primary">
            <div class="panel-heading"><h3>Liste des profils</h3></div>
            <table class="table table-hover" id="userTable" >
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody class="scrollable">
                    <?=$listProfil;?>
                </tbody>
            </table>
        </div>
        <p>Un clic sur un utilisateur permet d'acceder à sa fiche et d'en modifier roles et status.<p>
    </div><!--  end of row -->
</div><!--  end of page -->

<div id="usermodal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modification de compte :</h4>
            </div>
             <form action="<?= $this->url('administrator_profile');?>change-user" method="POST">
                <div class="modal-body cf">
                    <h4>Utilisateur : </h4>
                    <p class="bg-info" id="usermodal__userName"></p>
                    <div class="form-group usermodal__radio">
                        <p>Etat du compte : </p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="userActivity" id="usermodal__userActivity1" value="1">
                            Actif
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="userActivity" id="usermodal__userActivity2" value="0">
                            Suspendu
                          </label>
                        </div>
                    </div>
                     <div class="form-group usermodal__radio">
                        <p>Rôle de l'utilisateur : </p>
                        <div class="radio">
                            <label>
                                <input type="radio" name="userRole" id="usermodal__userRole1" value="student">
                                Etudiant
                              </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="userRole" id="usermodal__userRole2" value="administrator">
                            Administrateur
                          </label>
                        </div>
                    </div>
                        <input type="hidden" name="userStatus" id="usermodal__userStatus" value ="">
                        <input type="hidden" name="userId" id="usermodal__userId" value ="">
                </div>
                <div class="modal-footer">
                   
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" id="usermodal__button">Modifier</button>
                </div>
                </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $this->stop('main_content') ?>
