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
			}elseif(strlen($userLastName) <= 1){
				$isValid = false;
				$errormessage['userLastName'] = "Votre nom est trop court!";
			}
			if(empty($userFirstName)) {
				$isValid = false;
				$errormessage['userFirstName'] = "Vous devez indiquer votre prénom!";
			}elseif(strlen($userFirstName) <= 1 ) {
				$isValid = false;
				$errormessage['userFirstName'] = "Votre prénom est trop court!";
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
				$authentificationManager = new \W\Security\AuthentificationManager();
				//test user data exist in database
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
			else {
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
				//remember me checked ?
				

				//redirect
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
				$this->show('user/profile_student');
			break;

			case "2":			
				$this->show('user/profile_teacher');
			break;

			case "3":			
				$this->show('user/profile_admin');
			break;

			default :		
			echo "Fin de session !";	
				$this->show('user/login'); //Case where role is not define.
			break;

			

		}

	}

	public function modify(){
		
		$errormessage = [];
		$user = [];

		if(!empty($_POST)) {

			$result = $this->testUserForm();
			$isValid = $result[0];
			$errormessage =$result[1];

			if($isValid){
				//Submited data are correct.
				//update data in database
				$userManager = new \W\Manager\UserManager();
				$userManager->update([
						"first_name"  => $userFirstName,
						"last_name"   => $userLastName,
						"email"       => $userEmail,
						"password"    => password_hash($userPassword, PASSWORD_DEFAULT),
					],$id);
				//maj session 
				$this->refreshUser();
				//redirect user
				$this->redirectToRoute('user_profile');
			}

		}
		else {

			$user = $this->getUser();
			print_r($user);
		}
		$this->show('user/modify', [
				'errormessage' => $errormessage, 
				'userData'     => $user
				]);
	}


	public function logout()
	{
		$authentificationManager = new \W\Security\AuthentificationManager();
		$authentificationManager->logUserOut();
		$this->redirectToRoute('user_login');

	}

	public  function recovery_pwd()
	{
		//test if post
		if(!empty($_POST)){

			$userEmail = $_POST['userEmail'];
			//test email exist
			$userManager = new \W\Manager\UserManager();
			$userId = $userManager->getUserByUsernameOrEmail($userEmail);
			
			if(!$userId){

				$errormessage['userEmail'] = "Cette adresse nous est inconnue !";
				$this->show('user/recovery_pwd', ['errormessage' => $errormessage]);
			}
			else {
				//generate token
				$token = \W\Security\StringUtils::randomString(32);
				//add token to user in database
				$userManager = new \Manager\UserManager();
				$userManager->update([
							"token"      => $token,
							"token_time" => date('Y-m-d H:i:s')
						],$userId['id']);
				//mail content creat
				$mailcontent = "Bonjour, 

				Vous venez de faire une demande de renouvellement de mot de passe sur le site mcqcm.com.
				<a href=\"http://mcqcm.dev/renouvellement-mdp/?T=".$token."\">Renouvelez votre mot de passe</a>
				<br>
				L'équipe mcqcm.
				<br>
				<br>
				Vous disposez de 48h pour renouveller votre mot de passe à partir de ce lien";
				
				echo $mailcontent; 
				//send an email
				
				//inform user for success
			}
		}
		else {
			//display form forgot_pwd
			$this->show('user/recovery_pwd', []);
		}
	}

	public function renew_pwd(){
		//get user id with the token
		echo $token;
		die();
		if(!empty($token)){

			$userManager = new \Manager\UserManager();
			$user = $this->findByUserToken($token);


		}
		elseif(!empty($_POST)) {


			$isValid = true;
			//test 
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
			if($isValid) {
				//update user

				//redirect
				
			}
			
		}else{
			echo "cheater";
			//redirectToRoute('home');
		}	
			
	}


	public function testUserForm()
	{
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
		}elseif(strlen($userLastName) <= 1){
			$isValid = false;
			$errormessage['userLastName'] = "Votre nom est trop court!";
		}
		if(empty($userFirstName)) {
			$isValid = false;
			$errormessage['userFirstName'] = "Vous devez indiquer votre prénom!";
		}elseif(strlen($userFirstName) <= 1 ) {
			$isValid = false;
			$errormessage['userFirstName'] = "Votre prénom est trop court!";
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
		$formResult = [ $isValid, $errormessage];

		return $formResult;
	}


}