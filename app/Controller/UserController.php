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

			//validation du formulaire
			$result = $this->testUserForm();
			$isValid = $result[0];
			$errormessage =$result[1];


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
						"role" => "student"
					]);


				//test user data exist in database
				$result = $this->authentificationManager->isValidLoginInfo( $userEmail, $userPassword);
				if($result)
				{
					//$user = new \Manager\UserManager(); 
					$user = $this->userManager->find($result);
					//user connection
					$this->authentificationManager->logUserIn($user);
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
		//already connected ?
		$user = $this->getUser();
		if($user){

			$this->redirectToRoute('user_profile');

		} 

		$errormessage= [];

		if(!empty($_POST)){

			$userEmail = $_POST['userEmail'];
			$userPassword = $_POST['userPassword'];
			//Test user data in DB
			
			$isValid = true;
			$userId = $this->authentificationManager->isValidLoginInfo( $userEmail, $userPassword);
			if($userId)
			{

				//récupérer les données utilisateur
				$user = $this->userManager->find($userId);
				//user connection 
				$this->authentificationManager->logUserIn($user);
				//remember me checked ?
				//TODO add cookieset and cookie get method
				//redirect
				$this->redirectToRoute('user_profile');
			}
			else {
				$isValid = false;
				$errormessage['alerte'] = "Impossible de vous identifier.";
			}

			//Then redirect User to profil
			
		}
		$this->show('user/login', ['errormessage' => $errormessage]);
	}


	public function profile()
	{
		//get user role to redirect him 
		//if role isn't define, user is redirected to user_login
		$user = $this->getUser();
		switch($user['role']){

			case "student":			
				$this->show('user/profile_student');
			break;

			case "teacher":			
				$this->show('user/profile_teacher');
			break;

			case "administrator":			
				$this->show('user/profile_admin');
			break;

			default :		
				$this->redirectToRoute('user_login'); //Case where role is not define.
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
				//$userManager = new \Manager\UserManager();
				$this->userManager->update([
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

		}
		$this->show('user/modify', [
				'errormessage' => $errormessage, 
				'userData'     => $user
				]);
	}


	public function logout()
	{
		//$authentificationManager = new \W\Security\AuthentificationManager();
		$this->authentificationManager->logUserOut();
		$this->redirectToRoute('user_login');

		//todo Delete cookie

	}

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
				
				$mail = new \PHPMailer;
				//TODO ->Créer une class
				$accountManagerMail = 'contact.mcqcm@gmail.com';
				$accountManagerPwd  = '123456mcqcm';
				$accountManagerName = "Jean Valjean";

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = $accountManagerMail;          // SMTP username - > TODO ->a inclure dans un fichier
				$mail->Password = $accountManagerPwd;                      // SMTP password - > TODO ->a inclure dans un fichier
				$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 465;// 587;                                    // TCP port to connect to
				$mail->SMTPDebug = 0;
				//Set who the message is to be sent from
				$mail->setFrom($accountManagerMail, $accountManagerName); //- > TODO ->a inclure dans un fichier
				//Set an alternative reply-to address
				$mail->addReplyTo($accountManagerMail, $accountManagerName); //- > TODO ->a inclure dans un fichier
				//Set who the message is to be sent to
				$mail->addAddress($userEmail);
				$mail->addAddress('debug.mcqcm@gmail.com', 'The debug Manager');
				//Set the subject line
				$mail->Subject = 'Demande de renouvellement de mot de passe MCQCM.com';
				//Read an HTML message body from an external file, convert referenced images to embedded,
				//convert HTML into a basic plain-text alternative body
				$mail->msgHTML($mailContent); 						//TODO -> Créer un template de message en html css inline style
				//Replace the plain text body with one created manually
				//$mail->AltBody = 'This is a plain-text message body';
				//Attach an image file
				//send the message, check for errors
				if (!$mail->send()) {
				    $messageInfo = '<div class="message message--info">Nous avons rencontré un problème lors de l\'envoi du message de réinitialisation de votre mot de passe.</div>';
				    //TODO addd error to logs
				} 
				else {
				    $messageInfo = '<div class="message message--info">Nous venons de vous envoyer un mail à l\'adresse '. $userEmail . ' contenant un lien vous permettant de changer votre mot de passe. Ce lien est utilisable pendant 48heures. Si vous rencontrez des difficultés, utilisez notre formulaire de contact.</div>';
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

	public function renew_pwd($token, $userEmail){


		if(!empty($_POST)) {

			$isValid = true;
			//test posted data
			$userPassword = $_POST['userPassword'];
			$userPasswordConfirmed = $_POST['userPasswordConfirmed'];

			if(empty($userPassword)) {
				$isValid = false;
				$errormessage['userPassword'] = '<div class="message message--error">Mot de passe obligatoire</div>';
			}
			elseif($userPassword !== $userPasswordConfirmed) {
				$isValid = false;
				$errormessage['userPassword'] = '<div class="message message--error">Les mots de passe ne correspondent pas</div>';
			}

			if($isValid) {

				//get user id with the token && the email passed on url
				if(!empty($token) && !empty($userEmail)){

					//$userManager = new \Manager\UserManager();
					//get user info
					$user = $this->userManager->getUserByUsernameOrEmail($userEmail);
					//compare tokens
					if(password_verify($token, $user['token'])){

						if($user['token_time'] < date('Y-m-d H:i:s')){

							$errormessage = '<div class="message message--error">Le délai de renouvellement est dépassé. Vous devez effectuer une nouvelle demande.</div>';
							$this->redirectToRoute('user_recovery_pwd', ["errormessage" => $errormessage]);
						}
						else {
							//update user
							$this->userManager->update([
								"password"   => password_hash($userPassword, PASSWORD_DEFAULT),
								"token"      =>'',
								"token_time" => ''
							],$user['id']);

							//create a user Info
							$messageInfo = 'Modification prise en compte';
							//redirect to login
							$this->redirectToRoute('user_login');
						}
						

					}
					
				}
				else {
					// URL ERRONNEE
					$this->redirectToRoute('user_login');
				} 
			} else {
				// invalid pwd
				$this->show('user/renew_pwd', [
						"errormessage" => $errormessage
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
	 * [testUserForm : Use this class to test forms]
	 * @return $result[ $isvalid, $errormessage]
	 */
	public function testUserForm()
	{
		$userFirstName = $_POST['userFirstName'];
		$userLastName = $_POST['userLastName'];
		$userEmail = $_POST['userEmail'];
		$userPassword = $_POST['userPassword'];
		$userPasswordConfirmed = $_POST['userPasswordConfirmed'];

		//validation du formulaire
		$isValid = true;
		//$userManager = new \Manager\UserManager();

		if(empty($userLastName)) {
			$isValid = false;
			$errormessage['userLastName'] = '<div class="message message--error">Vous devez indiquer votre nom!</div';
		}elseif(strlen($userLastName) <= 1){
			$isValid = false;
			$errormessage['userLastName'] = '<div class="message message--error">Votre nom est trop court!"</div';
		}
		if(empty($userFirstName)) {
			$isValid = false;
			$errormessage['userFirstName'] = '<div class="message message--error">Vous devez indiquer votre prénom!</div';
		}elseif(strlen($userFirstName) <= 1 ) {
			$isValid = false;
			$errormessage['userFirstName'] = '<div class="message message--error">Votre prénom est trop court!</div';
		}

		if(empty($userEmail)) {
			$isValid = false;
			$errormessage['userEmail'] = '<div class="message message--error">Adresse Email obligatoire!</div';
		}
		else {

			if($this->userManager->emailExists($userEmail)) {
				$isValid = false;
				$errormessage['userEmail'] = '<div class="message message--error">Adresse Email déja utilisée par un autre compte !</div';
			}
			
		}

		if(empty($userPassword)) {
			$isValid = false;
			$errormessage['userPassword'] = '<div class="message message--error">Mot de passe obligatoire !</div';
		}
		else {
			if($userPassword !== $userPasswordConfirmed) {
				$isValid = false;
				$errormessage['userPassword'] = '<div class="message message--error">Les mots de passe ne correspondent pas !</div';
			}
		}
		$formResult = [ $isValid, $errormessage];

		return $formResult;
	}
}
