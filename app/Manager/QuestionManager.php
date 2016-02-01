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
		* This function is deprecated and will be replaced by lastId()
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
		public function lastId(){
			return $this->dbh->lastInsertId();
		}



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

			$sql = "SELECT questions.*, quizs__questions.* FROM `questions` LEFT JOIN quizs__questions ON questions.id = quizs__questions.question_id WHERE quizs__questions.quiz_id != 1 AND questions.title LIKE :keyword GROUP BY title ORDER BY title ASC/* LIMIT 5*/"; //is query without limit is okay with performance ?
			//WARNING !!!
			//the line above above is to be replace by 
			//$sql = "SELECT questions.*, quizs__questions.* FROM `questions` LEFT JOIN quizs__questions ON questions.id = quizs__questions.question_id WHERE quizs__questions.quiz_id != 2 AND questions.title LIKE '%" . $title . "%'";

			if (!empty($orderBy)){
		
				//sécurisation des paramètres, pour éviter les injections SQL
				if(!preg_match("#^[a-zA-Z0-9_$]+$#", $orderBy)){
					die("invalid orderBy param");
				}
				$orderDir = strtoupper($orderDir);
			}


			$sth = $this->dbh->prepare($sql);
			$sth->execute([
				":keyword" => "%" . $title . "%",
			]);
		
			return $sth->fetchAll();
	
		}

	}


