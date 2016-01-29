<?php

namespace Controller;

use \W\Controller\Controller;

class AdministratorController extends Controller
{
	private $manager;
	//private $authentificationManager;

	public function __construct(){
		
		$this->manager = new \Manager\AdministratorManager();
		//$this->authentificationManager = new \W\Security\AuthentificationManager();

	}

	public function listProfil(){

	}

	public function profil(){

		$this->allowTo('administrator');

		$listProfil = $this->userList();
        //$listModals = $this->userModals();

		$this->show('user/profile_admin', [
                "listProfil" => $listProfil,
                //"listModals" => $listModals
            ]);
	}

    public function setUserStatus(){

        if(!empty($_POST)){

            //change user status
            $userStatus = $_POST['userStatus'];
            $userStatus = ($userStatus == '1' ) ? '0' : '1';
            $userId = $_POST['userId'];
            $this->manager->setUserStatus($userStatus, $userId);

        }

        $this->redirectToRoute('administrator_profile');
    }


	public function userList(){

		$users = $this->manager->getUserList();
        $list ="";
		foreach ($users as $key => $value) {
			
            //add class for suspended users
            $suspendClass = ($value['is_active'] == '1')?'':'danger';

			$list.= "\r\n\t\t\t\t\t". sprintf('<tr class="%5$s" id="%4$s" data-toggle="modal" data-target="#usermodal%4$s"><td>%1$s</td><td>%2$s</td><td>%3$s</td></tr>',
					 $value['last_name'],
                     $value['first_name'],
					 $value['email'], 
                     $value['id'],
                     $suspendClass
				);
		}

		return $list;
	}

    public function userModals(){

        $users = $this->manager->getUserList();
        $listModals ="";
        foreach ($users as $key => $value) {

            $suspendStatus = ($value['is_active'] == '1')? 'suspendre' : 'activer';

            $suspendText = ($value['is_active'] == '1')? 'vilain' : 'gentil';

            $listModals.=sprintf('<div id="usermodal%1$s" class="modal fade" tabindex="-1" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Suspension de compte</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>%2$s %3$s a été %4$s !</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <form action="/administrator/set-user-status/" method="POST">
                                        <input type="hidden" name="userStatus" value ="%6$s">
                                        <input type="hidden" name="userId" value ="%1$s">
                                        <button type="submit" class="btn btn-primary" name="%5$s">%5$s</button>
                                    </form>
                                  </div>
                                </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->',
                            $value['id'],
                            $value['last_name'],
                            $value['first_name'],
                            $suspendText,
                            $suspendStatus,
                            $value['is_active']

            );           

        }

        return $listModals;
    }

    function findUsers(){

        if(!empty($_POST)){

            $search = $_POST['searchUser'];
            $result =  $this->manager->searchUser($search);
            $this->showJson($result);

        }
    }


    function getUserInfo(){

        $userId = $_GET['id'];
        $this->manager->setTable("users");
        $result = $this->manager->find($userId);

        $this->showJson($result);
    }
}
