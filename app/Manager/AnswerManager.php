<?php

namespace Manager;

use \W\Manager\Manager;

class AnswerManager extends Manager
{

	public function userName($usId)
		{
		if (!is_numeric($usId)) { return false; }
		$sql = "SELECT last_name, first_name FROM users WHERE id = '$usId'";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		$na = $sth->fetchAll();
		$nam = $na[0]['last_name'] . " " . $na[0]['first_name'];
		return $nam;
		}


	public function findQuizByUser($useid)
		{
		if (!is_numeric($id)) { return false; }
		$sql = "SELECT quiz_id FROM sessions WHERE user_id = '$useid'";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
		}

		public function findQuizBySession($sessid)
		{
		if (!is_numeric($sessid)) { return false; }
		$sql = "SELECT quiz_id FROM sessions WHERE id = '$sessid'";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
		}


	public function findTitle($id)
		{
		if (!is_numeric($id)) { return false; }
		$sqlTitle = "SELECT title FROM choices WHERE id = '$id'";
		$sth = $this->dbh->prepare($sqlTitle);
		$sth->execute();
		return $sth->fetchAll();
		}

	public function findAnswers($id)
		{
		if (!is_numeric($id)) { return false; }
		$sql = "SELECT * FROM " . $this->table . " WHERE $this->primaryKey = :id LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();
		return $sth->fetchAll();
		}


	public function list_user_quiz($userId, $quizId)
		{
			if ((!is_numeric($userId)) || (!is_numeric($quizId))) { return false; }

			$sqlUserQuiz = "SELECT u.last_name, u.first_name, q.title FROM quizs q, users u   
			WHERE (u.id = '$userId') AND (q.id = '$quizId')";
			$statementUserQuiz = $this->dbh->prepare($sqlUserQuiz);
			$statementUserQuiz->execute();
			$resultUserQuiz = $statementUserQuiz->fetchAll();
			return $resultUserQuiz;
		}


	public function list_choices_user_quiz($userId, $sessId)
		{
			// if ((!is_numeric($userId)) || (!is_numeric($sessId))) { return false; }

			$sql = "SELECT a.choices, a.question_id FROM answers a 
			WHERE a.user_id = :userId AND a.session_id = :sessId";
			$statement = $this->dbh->prepare($sql);
			$statement->bindValue(":userId", $userId);
			$statement->bindValue(":sessId", $sessId);
			$statement->execute();
			$result = $statement->fetchAll();
			return $result;
		}


	public function list_solution_choice($choiId)
		{	
			if (!is_numeric($choiId)) { return false; }

			$sql = "SELECT is_true FROM choices WHERE id = '$choiId'";
			$sth = $this->dbh->prepare($sql);
			$sth->execute();
			return $sth->fetchAll(); 
		}
	

	public function quizList()
		{
		$sqlQuizList = "SELECT DISTINCT quiz_id FROM sessions";
		$sth = $this->dbh->prepare($sqlQuizList);
		$sth->execute();
		return $sth->fetchAll();
		}


	public function quizTitle($quizId)
		{
		$sqlQuizTitle = "SELECT title FROM quizs WHERE id='$quizId'";
		$sth = $this->dbh->prepare($sqlQuizTitle);
		$sth->execute();
		return $sth->fetchAll();
		}


	public function quizIdTitle()
		{
		$sqlQuizIdTitle = "SELECT id, title FROM quizs";
		$sth = $this->dbh->prepare($sqlQuizIdTitle);
		$sth->execute();
		return $sth->fetchAll();
		}

	
	public function quizUsers($quizId) 
		{
		$sqlQuizUsers = "SELECT user_id, score FROM sessions WHERE quiz_id='$quizId'";
		$sth = $this->dbh->prepare($sqlQuizUsers);
		$sth->execute();
		return $sth->fetchAll();
		}

	
	public function userQuizList($usId)
		{
		$sqlQuizList = "SELECT quiz_id FROM sessions WHERE user_id='$usId'";
		$sth = $this->dbh->prepare($sqlQuizList);
		$sth->execute();
		return $sth->fetchAll();
		}


	public function countQuizUser($useI, $quiI) 
	{
		$sqlCountQuizUser = "SELECT count(*) FROM sessions WHERE (user_id='$useI' AND quiz_id='$quiI')";
		$sth = $this->dbh->prepare($sqlCountQuizUser);
		$sth->execute();
		return $sth->fetchAll();
	}


	public function userSession($uId, $sId)
		{
		$sqlUSExist = "SELECT * FROM answers WHERE (user_id='$uId' AND session_id='$sId')";
		$sth = $this->dbh->prepare($sqlUSExist);
		$sth->execute();
		return $sth->fetch();
		}


	public function userQuizScore($uId)
		{
		$sqlQuizScore = "SELECT sessions.score AS score, sessions.id AS sessionId, quizs.title AS quizTitle FROM sessions, quizs WHERE sessions.user_id='$uId' AND sessions.quiz_id = quizs.id";
		$sth = $this->dbh->prepare($sqlQuizScore);
		$sth->execute();
		return $sth->fetchAll();
		}


	public function student_result_viewer($studentId, $sessionId)
		{
			if ((!is_numeric($studentId)) || (!is_numeric($sessionId))) { return false; }

			$sqlUserQuiz = "SELECT s.score FROM sessions s  
			WHERE (s.id = '$sessionId') and (s.user_id = '$studentId')";
			$statementUserQuiz = $this->dbh->prepare($sqlUserQuiz);
			$statementUserQuiz->execute();
			$resultUserQuiz = $statementUserQuiz->fetchAll();
		}


	public function calculNoteSession($session)
		{
			$this->table = 'sessions';
			$resultSession = $this->findAnswers('$session')['score'];
		}


	public function calculNoteAll()
		{
			$this->table = 'sessions';
			$resultAll = $this->findAll('score', 'DESC');
			return $resultAll;
		}

	public function session_results($sess) {

			// $this->setTable('sessions');
			$sqlSession = "SELECT score FROM sessions where id='$sess'";
			$statementSession = $this->dbh->prepare($sqlSession);
			$statementSession->execute();
			$resultSession = $statementSession->fetchAll();
			return $resultSession;
			}

	public function quiz_results($qui) {

			// $this->setTable('sessions');
			$sqlQuiz = "SELECT score FROM sessions where quiz_id='$qui'";
			$statementQuiz = $this->dbh->prepare($sqlQuiz);
			$statementQuiz->execute();
			$resultQuiz = $statementQuiz->fetchAll();
			return $resultQuiz;
			}
		

	public function student_results($usid) {

			// $this->setTable('sessions');
			$sqlStudent = "SELECT score FROM sessions where user_id='$usid'";
			$statementStudent = $this->dbh->prepare($sqlStudent);
			$statementStudent->execute();
			$resultStudent = $statementStudent->fetchAll();
			return $resultStudent;
			}


	public function all_results() {

			// $this->setTable('sessions');
			$sqlAll = "SELECT score FROM sessions";
			$statementAll = $this->dbh->prepare($sqlAll);
			$statementAll->execute();
			$resultAll = $statementAll->fetchAll();
			return $resultAll;
			}
		

		public function student_score_record($user, $session, $scor)
		{
			$sql = "UPDATE sessions SET score = '$scor' WHERE id = '$session' AND user_id = '$user'";
			$sth = $this->dbh->prepare($sql);
			$sth->execute();
		}

}

