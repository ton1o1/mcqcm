<?php
	namespace Manager;
	//la classe de base du framework
	//use \W\Manager\Manager; // plus précisément : use \W\Manager\Manager as Manager;

	class QuestionManager extends \W\Manager\Manager
	{



		/**
		* This function is DEPRECATED and will be replaced by lastId()
		* Récupère la dernière ligne de la table, càd, celle qui vient d'être inséré
		* @param integer Identifiant
		* @return mixed Les données
		*/
		public function findLast()
		{
			
			$sql = "SELECT * FROM " . $this->table . " WHERE $this->primaryKey 	= LAST_INSERT_ID()";
			$sth = $this->dbh->prepare($sql);			
			$sth->execute();	
			return $sth->fetch();
		}

/**************************************************
	GET THE ID OF THE LAST INSERTION 
**************************************************/
		//Fonction de guillaume pour récupérer l'id de la dernière ligne insérée
		public function lastId(){
			return $this->dbh->lastInsertId();
		}

/**************************************************
	GET A QUESTION WITH ITS ID 
**************************************************/

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


/**************************************************
	RESEARCH A QUESTION BY ITS TEXT
**************************************************/

		/**
		 * Research a question according to its letters
		 * @param $title, the string to match
		 * @return JSON file
		 */
		public function searchQuestion($title){
			//%title% is sql regex

			$sql = "SELECT questions.*, quizs__questions.* FROM `questions` LEFT JOIN quizs__questions ON questions.id = quizs__questions.question_id WHERE quizs__questions.quiz_id != 3 AND questions.title LIKE :keyword GROUP BY title ORDER BY title ASC LIMIT 5 "; //is query without limit is okay with performance ?

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


