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


		public function searchQuestion($title, $orderBy = "title", $orderDir = "ASC", $limit = 5){
		
				$sql = "SELECT * FROM questions WHERE " . $title;
				if (!empty($orderBy)){
		
					//sécurisation des paramètres, pour éviter les injections SQL
					if(!preg_match("#^[a-zA-Z0-9_$]+$#", $orderBy)){
						die("invalid orderBy param");
					}
					$orderDir = strtoupper($orderDir);
		
					$sql .= " ORDER BY $orderBy $orderDir LIMIT $limit" ;
				}


	$string = "%" . $_GET['input'] . "%" ;

		$sql = "SELECT * FROM questions WHERE title LIKE :keyword ORDER BY title"












				$sth = $this->dbh->prepare($sql);
				$sth->execute([]);
		
				return $sth->fetchAll();
			}


		}


