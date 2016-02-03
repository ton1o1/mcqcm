<?php

	//The scrapper script is not finished

	require('simple_html_dom.php');

	// $html = file_get_html('http://www.w3schools.com/quiztest/quiztest.asp?qtest=HTML');

	// foreach($html->find("p[class='w3-large']") as $element) {
	//     echo $element->innertext . '<br>';	  
	// }
	
	// foreach ($html->find("[class='w3-padding-jumbo'] form label") as $element) {
	// 	echo $element->plaintext . '<br>';
	// }
	





	//Creation de l'objet PDO
/*	$pdo = new PDO('mysql:host=localhost;dbname=mcqcm', 'root', '', array(
		        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //on s'assure de communiquer en utf8
		        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
		        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
		    ));

	function findLast($table)
	{
			$pdo = new PDO('mysql:host=localhost;dbname=mcqcm', 'root', '', array(
		        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //on s'assure de communiquer en utf8
		        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
		        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
		    ));
		//SELECT les_colonnes FROM la_table WHERE id=LAST_INSERT_ID();
		$sql = "SELECT * FROM :table WHERE id = LAST_INSERT_ID();";
		echo $sql;
		$sth = $pdo->prepare($sql);			
		$sth->execute([
			":table" => $table,
		]);	
		return $sth->fetch();
	}

	//acces à la page à scrapper : intitulé des questions
	$html = file_get_html('http://www.alsacreations.com/quiz/resultat/1');
	foreach ($html->find("p[class='quiz-intitule']") as $element) {
		echo $element->plaintext . '<br>';
		$title = $element->plaintext;	
		$sql = "INSERT INTO `questions` (`id`, `creator_id`, `title`) VALUES (NULL, '1', :title);";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([":title" => $title]);

		//$questionId = findLast("questions");
		//echo "l'id de la question est " . $questionId;
		$hey = $pdo->query("SELECT * FROM :table WHERE id = LAST_INSERT_ID();");
		print_r($hey->fetch());

	}
	
	$html = file_get_html('http://www.alsacreations.com/quiz/lire/17-jquery-dbutant.html');
*/




echo "Les questions sont dans l'ordre";

echo "<pre>";



$html = file_get_html('http://www.alsacreations.com/quiz/resultat/9');



echo "QUESTIONS";
foreach ($html->find("[class='quiz-intitule]") as $element) {
	echo $element->plaintext . '<br>';
}

echo "CHOIX";
foreach ($html->find("[class='quiz-resultats-question'] li") as $k => $element) {
	echo $element->plaintext . '<br>';
	if(($k+1)%4===0){
		echo '<br>';
	}
}

echo "REPONSE";
foreach ($html->find("[class='quiz-check']") as $k => $element) {
	echo $element->plaintext . '<br>';
}










	// for($i=1; $i<11;$i++){
	// 	foreach ($html->find('.[name="rep['.$i.']"] label') as $element) {
	// 		echo "- ". $element->plaintext . '<br>';
	// 	}
	// }





	$pdo = new PDO('mysql:host=localhost;dbname=mcqcm', 'root', '');
	






