<?php
namespace Manager;

class DataManager extends \W\Manager\Manager 
{

/*********************************************
CUSTOM METHOD TO ADD NEW USERS VIA FAKER
thanks to :
MIT LICENSE
Copyright (c) 2011 François Zaninotto
Portions Copyright (c) 2008 Caius Durling
Portions Copyright (c) 2008 Adam Royle
Portions Copyright (c) 2008 Fiona Burrows

*********************************************/
    function insertUserViaFaker($nbToInsert){
    	//Call Faker 
		$faker = \Faker\Factory::create('fr_FR');
		
		//Usual process : $sql, prepare and then execute
		for ($i = 0; $i < $nbToInsert; $i++){
			$sql = "INSERT INTO `users` (`id`, `date_created`, `email`, `username`, `first_name`, `last_name`, `password`, `role`, `is_active`) VALUES (:id, :date_created, :email, :username, 	:first_name, :last_name, :password, :role, :is_active);";
		
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








