<?php

namespace Controller;

use \W\Controller\Controller;

class AnswerController extends Controller
{

	public function home()
	{
		$this->show('default/results');
	}


	public function valCompareQuestion($array1, $array2) {

	$note = 0;
	$noteQTot = [];
	$tabDiff = [];
	$textResults = "";
	$clef = 0;

$tabDiff = array_diff_assoc ($array1, $array2);
$lenArray = count($tabDiff);
if ($lenArray == 0) {
	$note = 1;
	echo('<span style="font-size: 20px; color:green;"><strong>' . "réponse exacte" . '</strong>' . ". " . '</span>');
	echo ('<br />' . "\n");
	} else { 
		if ($lenArray == 1) {
			echo('<span style="font-size: 20px; color:red;"><strong>' . "erreur" . '</strong>' . '</span><span style="font-size: 20px;">' . " pour le choix suivant : " . '</span>');
		} else {
			echo('<span style="font-size: 20px; color:red;"><strong>' . "erreurs" . '</strong>' . '</span><span style="font-size: 20px;">' . " pour les choix suivants : " . '</span>'); 
		}

	foreach ($tabDiff as $key => $value) {
		if ($clef == 1) {
			echo ", ";
		} else {
			$clef = 1;
			}
		
		$pdo = new PDO('mysql:host=localhost;dbname=mcqcm2', 'root');
		$sqlTitle = "SELECT title FROM choices WHERE id = '$key'";
		$statementTitle = $pdo->prepare($sqlTitle);
		$statementTitle->execute();
		$resultsTitle = $statementTitle->fetchAll();
			foreach ($resultsTitle[0] as $key2 => $value2) {
		echo ('<span style="font-size: 20px;><strong>' . $value2 . '</strong></span>');
			}
		}

	echo ". ";
	echo ('<br />' . "\n");
	}
	return ($note);
}



public function register()
	{

		$passwordError = "";
	
		if ($_POST) {

			$email = $_POST['email'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];


			// Validation des données
			$isValid = true;

			if ($password != $password2) {
				$isValid = false;
				$passwordError = "Les mots de passe ne correspondent pas !";
			}

			$userManager = new \Manager\UserManager();
			
			if ($userManager->emailExists($email)) {
				$isValid = false;
				$passwordError = "Email déjà utilisé !";
			}

			if ($isValid) {
				// insere en bdd
				
				$userManager->insert([
					"email" => $email,
					"password" => password_hash($password, PASSWORD_DEFAULT),
					"dateCreated" => date("Y-m-d H:i:s")
					]);
				// redirection de l'utilisateur
				$this->redirectToRoute("home");
			} 
		}

		$this->show('user/register', [
				"passwordError" => $passwordError
			]);
	}
}
