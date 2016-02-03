<?php
// require the Faker autoloader
require_once '../vendor/fzaninotto/faker/src/autoload.php';
// alternatively, use another PSR-0 compliant autoloader (like the Symfony2 ClassLoader for instance)

// use the factory to create a Faker\Generator instance

  $faker = Faker\Factory::create();

// generate data by accessing properties
echo $faker->name;
  // 'Lucy Cechtelar';
echo $faker->address;
  // "426 Jordy Lodge
  // Cartwrightshire, SC 88120-6700"
echo $faker->text;

//INSERT INTO `users` (`id`, `date_created`, `email`, `username`, `first_name`, `last_name`, `password`, `role`, `is_active`) VALUES (NULL, '2016-01-12 03:20:07', 'hello@gmail.com', 'hellousername', 'hellofirst', 'hellolast', 'hellopassword', '', '1');

		$sql = "SELECT * FROM " . $this->table . " WHERE $this->primaryKey = :id LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();

		return $sth->fetch();
	}