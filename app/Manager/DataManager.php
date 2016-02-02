<?php
namespace Manager;

class DataManager extends \W\Manager\Manager 
{
    function insertUserViaFaker(){
           //require_once 'faker.php';

	$faker = \Faker\Factory::create('fr_FR');
	
	//$pdo = new PDO('mysql:host=localhost;dbname=mcqcm', 'root', '');
	
	for ($i = 0; $i < 8; $i++){
		$sql = "INSERT INTO `users` (`id`, `date_created`, `email`, `username`, `first_name`, `last_name`, `password`, `role`, `is_active`) VALUES (:id, :date_created, :email, :username, :first_name, :last_name, :password, :role, :is_active);";
	//utilisers des :
	
		$sth = $this->dbh->prepare($sql);
		$sth->execute([
			":id" => NULL,
			":date_created" => $faker->date($format = 'Y-m-d', $max = 'now') . " " .$faker->time($format = 'H:i:s', $max = 'now'),
			":email" => $faker->freeEmail,
			":username" => $faker->userName,
			":first_name" => $faker->firstName,
			":last_name" => $faker->lastName,
			":password" => password_hash($faker->password, PASSWORD_DEFAULT),
			":role" => "",
			":is_active" => "1",
		]);	
    }







}
}







			  // $faker->date($format = 'Y-m-d', $max = 'now') . " ".
			  // $faker->time($format = 'H:i:s', $max = 'now') . "', '" . 
			  // $faker->freeEmail . "', '" .
			  // $faker->userName . "', '" . 
			  // $faker->firstName . "', '". 
			  // $faker->lastName . "', '". 
			  // $faker->password . "', '', '1')";








