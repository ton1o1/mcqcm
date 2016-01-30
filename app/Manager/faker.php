<?php

	require_once '../../vendor/fzaninotto/faker/src/autoload.php';
	$faker = Faker\Factory::create('fr_FR');
	
	$pdo = new PDO('mysql:host=localhost;dbname=mcqcm', 'root', '');
	
	for($i = 0; $i < 10; $i++){
		$sql = "INSERT INTO `users` (`id`, `date_created`, `email`, `username`, `first_name`, `last_name`, `password`, `role`, `is_active`) 
			VALUES (NULL, '".
			  $faker->date($format = 'Y-m-d', $max = 'now') . " ".
			  $faker->time($format = 'H:i:s', $max = 'now') . "', '" . 
			  $faker->freeEmail . "', '" .
			  $faker->userName . "', '" . 
			  $faker->firstName . "', '". 
			  $faker->lastName . "', '". 
			  $faker->password . "', '', '1')";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([]);	
	}




