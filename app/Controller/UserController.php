<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{
	private $userManager;
	private $authentificationManager;

	public function __construct(){
		
		$this->userManager = new \Manager\UserManager();
		$this->authentificationManager = new \W\Security\AuthentificationManager();

	}

	/**
	 * [register description]
	 * @return [type] [description]
	 */
	public function register()
	{
		$errormessage = [];

		if(!empty($_POST)) {
			$test['first_name'] =  $_POST['userFirstName'];
			$test['last_name'] = $_POST['userLastName'];
			$test['email'] = $_POST['userEmail'];
			$test['password'] = $_POST['userPassword'];
			$test['passwordConfirmed'] = $_POST['userPasswordConfirmed'];
			//validation du formulaire
			$result = $this->testUserForm($test);

			$isValid = $result[0];
			$errormessage =$result[1];

			//form is valid
			if($isValid){

				//insert user data in DB

				$this->userManager->insert([
						"first_name"  => $test['first_name'],
						"last_name"   => $test['last_name'],
						"email"       => $test['email'],
						"password"    => password_hash($test['password'], PASSWORD_DEFAULT),
						"date_created" => date('Y-m-d H:i:s'),
						"is_active" => "1",
						"role" => "student"
					]);


				//test user data exist in database
				$result = $this->authentificationManager->isValidLoginInfo( $test['email'], $test['password']);

				if($result)
				{
					//$user = new \Manager\UserManager(); 
					$user = $this->userManager->find($result);
					//user connection
					$this->authentificationManager->logUserIn($user);
					//afficher le profil user
					$_SESSION['messageInfo'] = '<div ="alert alert-info">Bienvenue</div>';
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
		$errormessage= [];
		//already connected ?
		$user = $this->getUser();
		if($user){

			$this->redirectToRoute('user_profile');

		}


		if(!empty($_POST)){

			$userEmail = $_POST['userEmail'];
			$userPassword = $_POST['userPassword'];
			$autoconnect = (!empty($_POST['auto_connect'])) ? $_POST['auto_connect'] : false;
			$isValid = true;
			
			//test if user is known 
			$userId = $this->authentificationManager->isValidLoginInfo( $userEmail, $userPassword);
			if($userId)
			{
				
				//get user data
				$user = $this->userManager->find($userId);
				//Manage suspended users
				if(!$user['is_active']){
					$isValid = false;
					$errormessage['alerte'] = '<div class="alert alert-danger" role="alert">Votre compte est temporairement suspendu. Vous pouvez contacter un administrateur pour en connaitre la raison ou demander la levée de la suspension.</div>';
				}
				else {

					//user connection 
					$this->authentificationManager->logUserIn($user);

					//remember me checked ?
					if(!empty($autoconnect)){

						$cookie = new \Service\cookies();
						$cookieToken = $cookie->createCookie($autoconnect);
						
						$this->userManager->update([
								"cookie"   => $cookieToken
							],$user['id']);

					}
					//redirect user
					$this->redirectToRoute('user_profile');

				}
			}
			else {
				$isValid = false;
				$errormessage['alerte'] = '<div class="alert alert-danger" role="alert">Impossible de vous identifier.</div>';
			}

			//Then redirect User to profil
			
		}
		$this->show('user/login', ['errormessage' => $errormessage]);
	}

	/**
	 * Get user role to redirect him 
	 * If role isn't define, user is redirected to user_login
	 */
	public function profile()
	{

		$user = $this->getUser();
		switch($user['role']){

			case "student":			
				$this->show('user/profile_student');
			break;


			case "administrator":			
				$this->redirectToRoute('administrator_profile');
			break;

			case "teacher":			
				$this->show('user/profile_teacher');
			break;

			default :		
				$this->redirectToRoute('user_login'); //Case where role is not define. 
			break;

			

		}

	}

	/**
	 *
	 *  Modify user email when user is logged
	 * @param  array() $test values to be tested
	 * @param  array() $user user datas
	 *
	 */
	public function modifyEmail($test,$user)
	{
		$result = $this->testUserForm($test);
		$isValid = $result[0];
		$errormessage =$result[1];

		if($isValid){

			//Submited data are correct.
			//update data in database

			$this->userManager->update([
					"email"  => $test['userEmailModify'],
				],$user['id']);
			//maj session 
			$this->authentificationManager->refreshUser();
			//redirect user
			$messageInfo = '<div class="alert alert-info">Modification de votre adresse Email validée !</div>';
			$_SESSION['messageInfo'] = $messageInfo;
			$this->redirectToRoute('user_profile',["messageInfo" => $messageInfo]);
		}else{

			$errormessage['modifyEmail'] = '<div class="alert alert-info">Problème de soumission !</div>';
			$this->show('user/modify', ["errormessage" => $errormessage]);
		}

	}

	/**
	 *
	 *  Modify password when user is logged
	 * @param  array() $test values to be tested
	 * @param  array() $user user datas
	 *
	 */
	public function modifyPassword($test,$user)
	{

		$result = $this->testUserForm($test);
		$isValid = $result[0];
		$errormessage =$result[1];

		if($isValid){
			//Submited data are correct.
			//update data in database

			$this->userManager->update([
					"password"  => password_hash($test['userNewPassword'],PASSWORD_DEFAULT),
				],$user['id']);
			//maj session 
			$this->authentificationManager->refreshUser();
			//redirect user
			$messageInfo = '<div class="alert alert-info">Modification de votre mot de passe validée !</div>';
			$_SESSION['messageInfo'] = $messageInfo;
			$this->redirectToRoute('user_profile');
		}else{
			$errormessage['modifyPassword'] = '<div class="alert alert-info">Problème de soumission !</div>';
			$this->show('user/modify', ["errormessage" => $errormessage]);
		}
	}

	public function modifyUserInfo($test,$user)
	{
		$result = $this->testUserForm($test);
		$isValid = $result[0];
		$errormessage =$result[1];

		if($isValid){
			//Submited data are correct.
			//update data in database

			$this->userManager->update([
					"first_name"  => $test['first_name'],
					"last_name"   => $test['last_name']
				],$user['id']);
			//maj session 
			$this->authentificationManager->refreshUser();
			//redirect user
			$messageInfo = '<div class="alert alert-info">Modification de vos données validée !</div>';
			$_SESSION['messageInfo'] = $messageInfo;
			$this->redirectToRoute('user_profile');
		}else{
			$errormessage['modifyUserInfo'] = '<div class="alert alert-danger">Problème de soumission !</div>';
			$this->show('user/modify', ["errormessage" => $errormessage]);
		}
	}

	/**
	 * 
	 * Modify user data : call distinct methods depending on submited datas
	 * 
	 */
	public function modify()
	{
		
		$errormessage = [];
		$user = $this->getUser();
		


		if(!empty($_POST)) {

			if(isset($_POST['userEmailModify'])){
				$test['userEmailModify'] = $_POST['userEmailModify'];
				$test['userPasswordConfirme'] = $_POST['userPasswordConfirme'];
				$test['userEmail'] = $user['email']; //we need to pass user email to check if couple email/password exist

				$this->modifyEmail($test,$user);

			}
			if(isset($_POST['userFirstName'])){
				$test['first_name'] = $_POST['userFirstName'];
				$test['last_name'] = $_POST['userLastName'];

				$this->modifyUserInfo($test,$user);

			}

			if(isset($_POST['userNewPassword'])){			

				$test['userPasswordModify'] = $_POST['userPasswordModify'];
				$test['userNewPassword'] = $_POST['userNewPassword'];
				$test['userEmail'] = $user['email']; //we need to pass user email to check if couple email/password exist

				$this->modifyPassword($test,$user);
			}


		}
		//Display user/modify with userData
		$this->show('user/modify', [
				'errormessage' => $errormessage, 
				'userData'     => $user
				]);
	}

	/**
	 * [logout description]
	 * @return [type] [description]
	 */
	public function logout()
	{

		$this->authentificationManager->logUserOut();
		
		$cookie = new \Service\Cookies();
		$cookie->unsetCookie();
		$this->redirectToRoute('user_login');

		//todo Delete cookie

	}

	/**
	 * [recovery_pwd description]
	 * @return [type] [description]
	 */
	public  function recovery_pwd()
	{
		//test if _post
		if(!empty($_POST)){

			$userEmail = $_POST['userEmail'];

			//test email exist
			//$userManager = new \Manager\UserManager();
			$userId = $this->userManager->getUserByUsernameOrEmail($userEmail);
			
			if(!$userId){

				$errormessage['userEmail'] = '<div class="message message--error">Cette adresse nous est inconnue !</div>';
				$this->show('user/recovery_pwd', ['errormessage' => $errormessage]);
			}
			else {
				//generate token
				$token = \W\Security\StringUtils::randomString(32);
				//48hours to use the token
				$date = new \DateTime();
				$dateLimite = $date->add(new \DateInterval("P2D"));
				//$userManager = new \Manager\UserManager();
				//add token to user in database
				$this->userManager->update([
							"token"      => password_hash($token, PASSWORD_DEFAULT),
							"token_time" => $dateLimite->format('Y-m-d H:i:s')
						],$userId['id']);
				//mail content creat
				$recoveryUrl = $this->generateUrl(
						'user_renew_pwd', [
							"token"      => $token, 
							"userEmail" => $userEmail
						], 
						true);

				$mailContent = "Bonjour, 

				<p>Nous venons de recevoir une demande de changement de mot de passe sur le site mcqcm.com.
				<br>
				<br>
				<a href=\"".$recoveryUrl."\">Cliquez ici pour renouvelez votre mot de passe</a>
				<br>
				<br>
				Si vous n'êtes pas à l'origine de la demande, ignorez ce message. Quelqu'un aura probablement saisi votre adresse email par inadvertance.
				<br>
				<br>
				Vous disposez de 48h pour renouveller votre mot de passe à partir de ce lien.
				<br>
				<br>
				L'équipe mcqcm.
				</p>
				";

				//send an email
				//$mail = new \Service\SendMails;
				//$mail->sendEmail($accountManager, $userEmail, $subject, $mailContent);
				//TODO ->Créer un Service
				$mail = new \PHPMailer;
				//Ajouter les données à la conf. 
				$accountManagerMail = 'contact.mcqcm@gmail.com';	
				$accountManagerPwd  = '123456mcqcm';
				$accountManagerName = "MCQCM";

				$mail->isSMTP();                                     	// Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  						// Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                              	// Enable SMTP authentication
				$mail->Username = $accountManagerMail;          		// SMTP username - > TODO ->a inclure dans un fichier
				$mail->Password = $accountManagerPwd;                   // SMTP password - > TODO ->a inclure dans un fichier
				$mail->SMTPSecure = 'ssl';                            	// Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465;// 587;                               // TCP port to connect to
				$mail->SMTPDebug = 0;
				$mail->setFrom($accountManagerMail, $accountManagerName); //Set who the message is to be sent from
				$mail->addReplyTo($accountManagerMail, $accountManagerName); //Set an alternative reply-to address
				$mail->addAddress($userEmail);//Set who the message is to be sent to
				$mail->Subject = 'Demande de renouvellement de mot de passe MCQCM.com';//Set the subject line
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				$mail->msgHTML($mailContent); 						//TODO -> Créer un template de message en html css inline style
				//Replace the plain text body with one created manually
				//$mail->AltBody = 'This is a plain-text message body';
				//Attach an image file
				//send the message, check for errors
				if (!$mail->send()) {
				    $messageInfo = '<div class="alert alert-info">Nous avons rencontré un problème lors de l\'envoi du message de réinitialisation de votre mot de passe.</div>';
				    //TODO addd error to logs
				} 
				else {
				    $messageInfo = '<div class="alert alert-info">Nous venons de vous envoyer un mail à l\'adresse '. $userEmail . ' contenant un lien vous permettant de changer votre mot de passe. Ce lien est utilisable pendant 48heures. Si vous rencontrez des difficultés, utilisez notre formulaire de contact.</div>';
				}

				//inform user for success
				
				$this->show('user/recovery_pwd', ["messageInfo"=> $messageInfo]);
			}
		}
		else {
			//display form forgot_pwd
			$this->show('user/recovery_pwd', []);
		}
	}

	/**
	 * [renew_pwd description]
	 * @param  [type] $token     [description]
	 * @param  [type] $userEmail [description]
	 * @return [type]            [description]
	 */
	public function renew_pwd($token, $userEmail)
	{


		if(!empty($_POST)) {
			
			//test posted data
			$test['password'] = $_POST['userPassword'];
			$test['passwordConfirmed'] = $_POST['userPasswordConfirmed'];
			$result = $this->testUserForm($test);
			$isValid = $result[0];
			$errormessage = $result[1];

			if($isValid) {
				
				//get user id with the token && the email passed on url
				if(!empty($token) && !empty($userEmail)){

					//$userManager = new \Manager\UserManager();
					//get user info
					$user = $this->userManager->getUserByUsernameOrEmail($userEmail);
					//compare tokens
					if(password_verify($token, $user['token'])){


						if($user['token_time'] < date('Y-m-d H:i:s')){

							$errormessage = '<div class="message message--error">Le délai de renouvellement de votre demande est dépassé. Vous devez effectuer une nouvelle demande.</div>';
							$_SESSION['messageInfo'] = $errormessage;
							
							$this->redirectToRoute('user_recovery_pwd');
						}
						else {
							
							//update user & delete token infos
							$this->userManager->update([
								"password"   => password_hash($test['password'], PASSWORD_DEFAULT),
								"token"      =>'',
								"token_time" => ''
							],$user['id']);

							//create a user Info
							$messageInfo = 'Modification prise en compte';
							$user['token_time'] = $messageInfo;
							$this->redirectToRoute('user_login');
						}


					}
					else{

					$messageInfo = 'Erreur rencontrée. Renouvelez votre demande';
					$_SESSION['messageInfo'] = $messageInfo;
					$this->redirectToRoute('user_login');

					}
					
				}
				else {
					// URL ERRONNEE

					$messageInfo = 'Erreur rencontrée. Renouvelez votre demande';
					$_SESSION['messageInfo'] = $messageInfo;
					$this->redirectToRoute('user_login');
				} 
			} else {
				// invalid pwd

				$this->show('user/renew_pwd', [
						"errormessage" => $errormessage,
						"token"      => $token, 
						"userEmail" => $userEmail
					]);
			}
		}
		else {
			//display form email link
				$this->show('user/renew_pwd', [
						"token"      => $token, 
						"userEmail" => $userEmail
					]);
		}
	
	}

	/**
	 * Test submited values
	 * return if tested value are or manage error message 
	 * @param  array() $test : values to be tested
	 * @return array()  $formResult = [ $isValid, $errormessage]
	 */
	public function testUserForm($test)
	{
		//initialisation du test
		$isValid = true;
		$errormessage = [];


		if(isset($test['last_name'])){
			if(empty($test['last_name'])) {
				$isValid = false;
				$errormessage['userLastName'] = '<div class="message message--error">Vous devez indiquer votre nom !</div>';
			}elseif(strlen($test['last_name']) <= 1){
				$isValid = false;
				$errormessage['userLastName'] = '<div class="message message--error">Votre nom est trop court !"</div>';
			}
		}

		if(isset($test['first_name'])){
			if(empty($test['first_name'])) {
				$isValid = false;
				$errormessage['userFirstName'] = '<div class="message message--error">Vous devez indiquer votre prénom !</div>';
			}elseif(strlen($test['first_name']) <= 1 ) {
				$isValid = false;
				$errormessage['userFirstName'] = '<div class="message message--error">Votre prénom est trop court !</div>';
			}
		}


		if(isset($test['email'])){
			if(empty($test['email'])) {
				$isValid = false;
				$errormessage['userEmail'] = '<div class="message message--error">Adresse Email obligatoire !</div>';
			}
			elseif(!filter_var($test['email'], FILTER_VALIDATE_EMAIL)) {
				$isValid = false;
				$errormessage['userEmail'] = '<div class="message message--error">Adresse Email invalide !</div>';				

			}else{

				if($this->userManager->emailExists($test['email'])) {
					$isValid = false;
					$errormessage['userEmail'] = '<div class="message message--error">Adresse Email déja utilisée par un autre compte !</div>';
				}
				
			}
		}

		//Changing user Email tests
		//need to check if email is not null
		//		->			email is valif
		//		->			email not already exist
		//		->			password is not empty
		//		->			couple password / oldemail exist 
		if(isset($test['userEmailModify'])){
			if(empty($test['userEmailModify'])) {
				$isValid = false;
				$errormessage['userEmailModify'] = '<div class="message message--error">Adresse Email obligatoire !</div>';
			}
			elseif(!filter_var($test['userEmailModify'], FILTER_VALIDATE_EMAIL)) {
				$isValid = false;
				$errormessage['userEmailModify'] = '<div class="message message--error">Adresse Email invalide !</div>';				

			}
			else{

				if($this->userManager->emailExists($test['userEmailModify'])) {
					$isValid = false;
					$errormessage['userEmailModify'] = '<div class="message message--error">Adresse Email déja utilisée par un autre compte !</div>';
				}
			}
			
			if(isset($test['userPasswordConfirme'])){
				if(empty($test['userPasswordConfirme'])) {
					$isValid = false;
					$errormessage['userPasswordConfirme'] = '<div class="message message--error">Mot de passe obligatoire !</div>';
				}
				else{
					$userId = $this->authentificationManager->isValidLoginInfo( $test['userEmail'], $test['userPasswordConfirme']);
					if(!$userId){
						$isValid = false;
						$errormessage['userPasswordConfirme'] = '<div class="message message--error">Mot de passe incorrect !</div>';
					}
				}
	
			}
		}

		//changing password tests
		if(isset($test['userNewPassword'])){

			if(empty($test['userPasswordModify'])) {
				$isValid = false;
				$errormessage['userPasswordModify'] = '<div class="message message--error">Mot de passe obligatoire !</div>';
			}elseif(strlen($test['password']) > 3 ){
				$isValid = false;
				$errormessage['userPassword'] = '<div class="message message--error">Mot de passe trop court !</div>';
			}
			else{
				$userId = $this->authentificationManager->isValidLoginInfo( $test['userEmail'], $test['userPasswordModify']);
				if(!$userId){
					$isValid = false;
					$errormessage['userPasswordModify'] = '<div class="message message--error">Mot de passe incorrect !</div>';
				}

			}

			if(empty($test['userNewPassword'])) {
				$isValid = false;
				$errormessage['userNewPassword'] = '<div class="message message--error">Nouveau mot de passe obligatoire !</div>';
			}elseif(strlen($test['userNewPassword']) < 3 ){
				$isValid = false;
				$errormessage['userNewPassword'] = '<div class="message message--error">Nouveau mot de passe trop court !</div>';
			}	

		}

		if(isset($test['password'])){

			if(empty($test['password'])) {
				$isValid = false;
				$errormessage['userPassword'] = '<div class="message message--error">Mot de passe obligatoire !</div>';
			}
			elseif(strlen($test['password']) < 3 ){
				$isValid = false;
				$errormessage['userPassword'] = '<div class="message message--error">Mot de passe trop court !</div>';
			}
			else {
				if($test['password'] !== $test['passwordConfirmed']) {
					$isValid = false;
					$errormessage['userPassword'] = '<div class="message message--error">Les mots de passe ne correspondent pas !</div>';
				}
			}
		}

		$formResult = [ $isValid, $errormessage];

		return $formResult;
	}

}
