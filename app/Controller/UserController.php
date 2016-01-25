<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	/**
	 * [register description]
	 * @return [type] [description]
	 */
	public function register()
	{
		echo "register";
		$errormessage = [];

		if(!empty($_POST)) {

			$username = $_POST['userName'];
			$userSurname = $_POST['userSurname'];
			$email = $_POST['userEmail'];
			$password = $_POST['userPassword'];
			$passwordConfirmed = $_POST['userPasswordConfirmed'];

			//validation du formulaire
			$isValid = true;
			$userManager = new \Manager\UserManager();

			if(empty($username)){
				$isValid = false;
				$errormessage['username'] = "Nom d'utilisateur obligatoire!";
			}

			if(empty($email)){
				$isValid = false;
				$errormessage['email'] = "Adresse Email obligatoire!";
			}
			else {

				if($userManager->emailExists($email)){
					$isValid = false;
					$errormessage['email'] = "Adresse Email déja utilisé!";
				}
				
			}

			if(empty($password)){
				$isValid = false;
				$errormessage['password'] = "Mot de passe obligatoire!";
			}
			else {
				if($password !== $passwordConfirmed) {
					$isValid = false;
					$errormessage['password'] = "Les mots de passe ne correspondent pas !";
				}
			}



			//Form is valid
			if($isValid){

				//insert user data in DB
				
				$userManager->insert([
						"username"    => $username,
						"email"       => $email,
						"password"    => password_hash($password, PASSWORD_DEFAULT),
						"dateCreated" => date('Y-m-d H:i:s')
					]);

				//Then redirect User
				$this->redirectToRoute('profile');
				
			}
			else{
				//afficher les erreurs
			}

		}

		$this->show('user/register', ['errormessage' => $errormessage]);
	}
	
	public function login()
	{
		echo "login";
		$errormessage= [];

		if(!empty($_POST)){

			$userEmail = $_POST['userEmail'];
			$userPassword = $_POST['userPassword'];
				//insert user data in DB
				
			$userManager->select([
					"email"       => $email,
					"password"    => password_hash($password, PASSWORD_DEFAULT),
				]);

			//Then redirect User
			$this->redirectToRoute('profile');
				
		}

		$this->show('user/login', ['errormessage' => $errormessage]);
	}


}