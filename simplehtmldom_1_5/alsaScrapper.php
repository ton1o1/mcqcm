<?php
	require('simple_html_dom.php');

	// $html = file_get_html('http://www.w3schools.com/quiztest/quiztest.asp?qtest=HTML');

	// foreach($html->find("p[class='w3-large']") as $element) {
	//     echo $element->innertext . '<br>';	  
	// }
	
	// foreach ($html->find("[class='w3-padding-jumbo'] form label") as $element) {
	// 	echo $element->plaintext . '<br>';
	// }
	

	//Alsacreations
	$pdo = new PDO('mysql:host=localhost;dbname=mcqcm', 'root', '', array(
		        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //on s'assure de communiquer en utf8
		        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
		        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
		    ));

	$html = file_get_html('http://www.alsacreations.com/quiz/lire/17-jquery-dbutant.html');
	foreach ($html->find("p[class='quiz-intitule']") as $element) {
		echo $element->plaintext . '<br>';

		$title = $element->plaintext;
		
		$sql = "INSERT INTO `questions` (`id`, `creator_id`, `title`) VALUES (NULL, '1', :title);";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([":title" => $title]);		
	}
	






	//echo "<pre>";
	//print_r($html->find("p[class='quiz-intitule']"));
//
//
//
//
	//for($i=1; $i<11;$i++){
	//	foreach ($html->find('.[name="rep['.$i.']"] label') as $element) {
	//		echo "- ". $element->plaintext . '<br>';
	//	}
	//}
//
//
//
//
	//$html->find("p[class='quiz-intitule']");
//
//
	////http://www.alsacreations.com/quiz/resultat/18
	//
//
//
	//$html = file_get_html('http://www.alsacreations.com/quiz/lire/17-jquery-dbutant.html');





	







	







	$pdo = new PDO('mysql:host=localhost;dbname=mcqcm', 'root', '');
	






