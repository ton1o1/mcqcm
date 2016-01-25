<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{


	public function __construct(){

	}

	/**
	 * Page d'accueil par défaut
	 */
	/**
	 * [register description]
	 * @return [type] [description]
	 */
	public function register()
	{
		$errormessage = [];

		if(!empty($_POST)) {

			$userFirstName = $_POST['userFirstName'];
			$userLastName = $_POST['userLastName'];
			$userEmail = $_POST['userEmail'];
			$userPassword = $_POST['userPassword'];
			$userPasswordConfirmed = $_POST['userPasswordConfirmed'];

			//validation du formulaire
			$isValid = true;
			$userManager = new \Manager\UserManager();

			if(empty($userLastName)) {
				$isValid = false;
				$errormessage['userLastName'] = "Vous devez indiquer votre nom!";
			}elseif(strlen($userLastName) < 3){
				$isValid = false;
				$errormessage['userLastName'] = "Vous devez indiquer votre nom!";
			}
			if(empty($userFirstName)) {
				$isValid = false;
				$errormessage['userFirstName'] = "Vous devez indiquer votre prénom!";
			}elseif(strlen($userFirstName) < 3 ) {
				$isValid = false;
				$errormessage['userFirstName'] = "Vous devez indiquer votre prénom!";
			}

			if(empty($userEmail)) {
				$isValid = false;
				$errormessage['userEmail'] = "Adresse Email obligatoire!";
			}
			else {

				if($userManager->emailExists($userEmail)) {
					$isValid = false;
					$errormessage['userEmail'] = "Adresse Email déja utilisée par un autre compte !";
				}
				
			}

			if(empty($userPassword)) {
				$isValid = false;
				$errormessage['userPassword'] = "Mot de passe obligatoire !";
			}
			else {
				if($userPassword !== $userPasswordConfirmed) {
					$isValid = false;
					$errormessage['userPassword'] = "Les mots de passe ne correspondent pas !";
				}
			}



			//Form is valid
			if($isValid){

				//insert user data in DB

				$userManager->insert([
						"first_name"  => $userFirstName,
						"last_name"   => $userLastName,
						"email"       => $userEmail,
						"password"    => password_hash($userPassword, PASSWORD_DEFAULT),
						"date_created" => date('Y-m-d H:i:s'),
						"is_active" => "1",
						"role" => "1"
					]);

				//Authentification
				//test user data
				$authentificationManager = new \W\Security\AuthentificationManager();
				$result = $authentificationManager->isValidLoginInfo( $userEmail, $userPassword);
				if($result)
				{
					$user = new \Manager\UserManager(); 
					$user = $userManager->find($result);
					//user connection
					$authentificationManager->logUserIn($user);
					//afficher le profil user
					$this->redirectToRoute('user_profile');
				}else {
					//probleme d'insertion dans la table ?
				}
				
			}
			else{
				//DisplayErrors
			}

		}

		$this->show('user/register', ['errormessage' => $errormessage]);
	}
	
	/**
	 * User Login Function
	 *  
	 */
	public function login()
	{
		$user = $this->getUser();
		var_dump($user);
		die();
		//already connected ?
		if($user){
			$this->show('user/profile');
		} else {

			//identification

		}

		$errormessage= [];

		if(!empty($_POST)){

			$userEmail = $_POST['userEmail'];
			$userPassword = $_POST['userPassword'];
			//Test user data in DB
			
			$isValid = true;


			$authentificationManager = new \W\Security\AuthentificationManager();
			$result = $authentificationManager->isValidLoginInfo( $userEmail, $userPassword);
			if($result)
			{
				//récupérer les données utilisateur
				$userManager = new \Manager\UserManager(); 
				$user = $userManager->find($result);
				//connexion de l'utilisateur
				$authentificationManager->logUserIn($user);

				$this->redirectToRoute('user_profile');
			}
			else {
				$isValid = false;
				$errormessage['alerte'] ="Impossible de vous identifier.";
			}

			//Then redirect User to profil
			
		}
		$this->show('user/login', ['errormessage' => $errormessage]);
	}


	public function profile()
	{

		$user = $this->getUser();

		switch($user['role']){

			case "1":			
				$this->show('user/profile');
			break;

			case "2":			
				$this->show('user/profile');
			break;

			case "3":			
				$this->show('user/profile');
			break;

			default :			
				$this->show('user/profile');
			break;

			

		}

	}


	public function logout()
	{
		$authentificationManager = new \W\Security\AuthentificationManager();
		$authentificationManager->logUserOut();
	}


}