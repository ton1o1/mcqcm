<?php
	require('simple_html_dom.php');

	// Create DOM from URL or file
$html = file_get_html('http://www.google.com');

//http://www.w3schools.com/quiztest/quiztest.asp?qtest=HTML

// Find all images 
// foreach($html->find('p') as $element) {

//        echo $element->src . '<br>';
// }

//Find all links 
foreach($html->find('a') as $element){	
       echo $element->href . '<br>';
} 


echo '<br>' . "DEUXIEME SCRAP " .'<br>';

$html = file_get_html('http://www.w3schools.com/quiztest/quiztest.asp?qtest=HTML');

//Find all images 
foreach($html->find("p[class='w3-large']") as $element) {
    echo $element->innertext . '<br>';
  
}

foreach ($html->find("[class='w3-padding-jumbo'] form label") as $element) {
	echo $element->plaintext . '<br>';
}

$html = file_get_html('http://www.w3schools.com/quiztest/quiztest.asp?qtest=HTML');

//Find all images 
foreach($html->find("p[class='w3-large']") as $element) {
    echo $element->innertext . '<br>';
  
}

foreach ($html->find("[class='w3-padding-jumbo'] form label") as $element) {
	echo $element->plaintext . '<br>';
}
