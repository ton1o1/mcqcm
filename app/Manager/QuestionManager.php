<?php
	namespace Manager;
	//la classe de base du framework
	//use \W\Manager\Manager; // plus précisément : use \W\Manager\Manager as Manager;

	class QuestionManager extends \W\Manager\Manager
	{
		/**
		* Récupère la dernière ligne de la table, càd, celle qui vient d'être 	inséré
		* @param  integer Identifiant
		* @return mixed Les données
		*/
		public function findLast()
		{
			//SELECT les_colonnes FROM la_table WHERE id=LAST_INSERT_ID();
			$sql = "SELECT * FROM " . $this->table . " WHERE $this->primaryKey 	= LAST_INSERT_ID()";
			$sth = $this->dbh->prepare($sql);			
			$sth->execute();	
			return $sth->fetch();
		}
		//Fonction de guillaume pour récupérer l'id de la dernière ligne insérée
		// public function lastId(){
		// 	return $this->dbh->lastInsertId();
		// }



		public function findQuestion($id)
		{
			if (!is_numeric($id)){
				return false;
			}
	
			$sql = "SELECT * FROM questions WHERE id = " . $id;
			echo $sql;
			$sth = $this->dbh->prepare($sql);
			$sth->execute([]);
			
			return $sth->fetchAll();
		}

		/**
		 * Recherche une question par son intitulé
		 * @param $title, une chaîne de caractère de recherche
		 * @return un fichier JSON 
		 */
		public function searchQuestion($title){
			//title is actually regex

			$sql = "SELECT * FROM questions WHERE title LIKE :keyword ORDER BY title";

			if (!empty($orderBy)){
		
				//sécurisation des paramètres, pour éviter les injections SQL
				if(!preg_match("#^[a-zA-Z0-9_$]+$#", $orderBy)){
					die("invalid orderBy param");
				}
				$orderDir = strtoupper($orderDir);
			}


			$sth = $this->dbh->prepare($sql);
			$sth->execute([
				":keyword" => "%" . $title . "%"
			]);
		
			return $sth->fetchAll();
	
		}


	// $searchInput = "%" . $_GET['input'] . "%" ;
	// // echo $searchInput;
	// //requete test $sql = 'SELECT serie FROM book WHERE serie LIKE :keyword';
	// $sql = 'SELECT cover FROM book WHERE serie LIKE :keyword ORDER BY cover ASC LIMIT 10';
	// $statement = $pdo->prepare($sql);
	// $statement ->execute([":keyword" => "%" . $searchInput . "%"]);
	// //$statement ->execute();
	// $array = $statement->fetchAll();

	// $statementJson = json_encode($array);
	// header("Content-Type: application/json");
	// // //ajoute un en-tête au fichier pour faire comprendre au navigateur qu'on parle en JSON 	
	// // header("Content-Type: application/json");
	// echo $statementJson;
	// // 




		}


