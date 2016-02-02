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


    /**
     * Display administrator profil page
     */
	public function profil(){

		$this->allowTo('administrator');

		$listProfil = $this->userList();

		$this->show('user/profile_admin', [
                "listProfil" => $listProfil,
            ]);
	}


    public function changeUser()
    {

        if(!empty($_POST)){

            $this->setUserStatus();

            $this->setUserRole();

        }
        $this->redirectToRoute('administrator_profile');
    }

    /**
     * Change User Status
     */
    public function setUserStatus(){
        if(!empty($_POST)){
            //change user status
            $userStatus = $_POST['userActivity'];
            $userId = $_POST['userId'];

            $userStatus = ($userStatus == '1' ) ? '1' : '0';
            $this->manager->setUserStatus($userStatus, $userId);
        }

    }

    /**
     * Change Role Status
     */
    public function setUserRole(){

        if(!empty($_POST)){
            //change user status
            $userRole = $_POST['userRole'];
            $userId = $_POST['userId'];
            $this->manager->setUserRole($userRole, $userId);
        }
    }

    /**
     * Generate a html string containing a list of table row.
     * @return list [string]
     */
	public function userList(){


        $start = (!empty($_GET['next'])) ? $_GET['next'] : '0';
        $offset = (!empty($_GET['offset'])) ? $_GET['offset'] : '100';


		$users = $this->manager->getUserList($start,$offset);
        $list ="";
		foreach ($users as $key => $value) {
			
            //add class for suspended users
            $suspendClass = ($value['is_active'] == '1')?'default':'danger';
            //add class for admin users
            $adminClass = ($value['role'] == 'administrator')?'glyphicon glyphicon-sunglasses': ''.$suspendClass;

			$list.= "\r\n\t\t\t\t\t". sprintf('<tr class="%5$s" id="%4$s" data-toggle="modal" data-target="#usermodal"><td scope="row">%1$s</td><td>%2$s</td><td>%3$s</td><td><span class="%6$s" aria-hidden="true"></span></td></tr>',
					 $value['last_name'],
                     $value['first_name'],
					 $value['email'], 
                     $value['id'],
                     $suspendClass,
                     $adminClass
				);
		}

		return $list;
	}

    /**
     * Generate a list of users wich repond to the administrator search
     * @return $result as a Json object
     */
    function findUsers(){

        if(!empty($_POST)){

            $search = $_POST['searchUser'];
            $result =  $this->manager->searchUser($search);
            $this->showJson($result);

        }
    }

    /**
     * Get user info by id
     * @return $result as a Json object
     */
    function getUserInfo(){

        $userId = $_GET['id'];
        $this->manager->setTable("users");
        $result = $this->manager->find($userId);

        $this->showJson($result);
    }
}
