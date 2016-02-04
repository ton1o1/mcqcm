<?php

function valCompareQuestion($array1, $array2) {

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


define("DBHOST", "localhost"); 	//ip du serveur MySQL
    define("DBUSER", "root"); 		//username MySQL
    define("DBPASS", "");			//mot de passe MySQL
    define("DBNAME", "mcqcm2"); 		//nom de la bdd

	try {
		//crée un objet PDO
		$pdo = new PDO(
			'mysql:host='.DBHOST.';dbname='.DBNAME, 	//dsn
			DBUSER, 	//username 
			DBPASS, //mot de passe
			array(
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //pour communiquer en utf8 avec le serveur MySQL
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on veut recevoir des arrays associatifs, dans les requêtes SELECT
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING //on veut afficher toutes les erreurs MySQL
			)
		);
	} catch (PDOException $e) {
	    echo 'Erreur de connexion : ' . $e->getMessage();
	}

// $pdo = new PDO('mysql:host=localhost;dbname=mcqcm2', 'root');

$sqlUserQuiz = "SELECT u.last_name, u.first_name, q.title FROM quizs q, users u  
WHERE (u.id = '1') AND (q.user_id = u.id) AND (q.id = '1')";

$statementUserQuiz = $pdo->prepare($sqlUserQuiz);
$statementUserQuiz->execute();
$resultUserQuiz = $statementUserQuiz->fetchAll();

foreach ($resultUserQuiz as $key => $value) {
	$textPresentation = "Résultats du " . $value["title"] . " pour le candidat " . $value["last_name"] . " " . $value["first_name"] . " : ";
	echo('<h2 style="font-size: 24px; color:blue;"><strong>' . $textPresentation . '</strong></h2>');
	}

$sql = "SELECT a.choices, a.question_id FROM quizs__questions q, answers a 
WHERE (q.question_id = a.question_id) AND (a.user_id = '1') AND (q.quiz_id = '1')";

$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetchAll();


$choiceId = [];
$tabSolution = [];
$tabChoiceTot = [];
$tabChoice = [];
$resultSolution = [];
$str = "";
$strChoice = "";
$answer = "";
$m = 0;
$noteTotale = 0;

foreach ($result as $key => $value) {
	
	$tabChoice = unserialize($value["choices"]);
	$tabChoiceTot = $tabChoiceTot + $tabChoice;
	echo('<br />' . "\n");
	echo ('<span style="font-size: 20px;">' . "Pour la question " . '<strong>' . $value["question_id"] . '</strong>' . ", " . '</span>');

	foreach ($tabChoice as $key => $value) {
		$sqlSolution = "SELECT c.is_true FROM choices c WHERE c.id = '$key'";
		$statementSolution = $pdo->prepare($sqlSolution);
		$statementSolution->execute();
		$resultSolution = $statementSolution->fetchAll(PDO::FETCH_COLUMN, 0); 
		$tabSolution[$key] = intval($resultSolution[0]);
	}

	$noteTotale += valCompareQuestion($tabChoice, $tabSolution);
} 

echo ('<br />' . "\n");
echo ('<h2 style="color:red;"><strong>' . "Note : " . $noteTotale . "/20" . '</strong></h2>');

?>
