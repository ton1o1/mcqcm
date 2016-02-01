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

	$html = file_get_html('http://www.alsacreations.com/quiz/lire/17-jquery-dbutant.html');
	foreach ($html->find("p[class='quiz-intitule']") as $element) {
		echo $element->plaintext . '<br>';
	}

	for($i=1; $i<11;$i++){
		foreach ($html->find('.[name="rep['.$i.']"] label') as $element) {
			echo "- ". $element->plaintext . '<br>';
		}
	}

	$pdo = new PDO('mysql:host=localhost;dbname=mcqcm', 'root', '');
	






