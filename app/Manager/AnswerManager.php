<?php

namespace Manager;

use \W\Manager\Manager;

class AnswerManager extends Manager
{



/*
$userManager = new \Manager\UserManager();
$user = $userManager->getUserByUsernameorEmail($email);
$token = \W\Security\StringUtils::randomString(32);
$userManager->update([
'token' => $token,], $user['id']);
$resetLink = $this->generateUrl('new_password', [
'token' => $token,
'email' => $email
], true);
*/

/* 
public function list_quizs($userId)
	{
		$sql = "SELECT title FROM quizs WHERE user_id = '$userId'";
	}
*/ 

/*	
	public function chp_table_id_find($stringChamps, $stringTables, $id) {
		if (!is_numeric($id)){
			return false;
		}

		$sql = "SELECT " . $stringChamps . "FROM " . $stringTables . " WHERE $this->primaryKey = :id LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();

		return $sth->fetch();

		}
	

		$answer = new \AnswerManager;
		$result = $this->chp_table_id_find($champ, $table, $id);
		$results = $this->studentSessionResult($sessionId, $userId);
*/


	public function findQuizBySession($id)
		{
		if (!is_numeric($id)) { return false; }
		$sql = "SELECT quiz_id FROM sessions WHERE id = '$id'";
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


	public function list_choices_user_quiz($userId, $quizId)
		{
			if ((!is_numeric($userId)) || (!is_numeric($quizId))) { return false; }

			$sql = "SELECT a.choices, a.question_id FROM quizs__questions q, answers a 
			WHERE (q.question_id = a.question_id) AND (a.user_id = '$userId') AND (q.quiz_id = '$quizId')";
			$statement = $this->dbh->prepare($sql);
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

			/* $sqlSolution = "SELECT c.is_true FROM choices c WHERE c.id = '$choiId'";
			$statementSolution = $pdo->prepare($sqlSolution);
			$statementSolution->execute();
			$resultSolution = $statementSolution->fetchAll(PDO::FETCH_COLUMN, 0); 
			$tabSolution[$key] = intval($resultSolution[0]); */
		}


	public function user_quizs_derouler($userId) {

	  	$this->table = 'quizs';
		$resultList = $this->findAnswers('$userId')['title'];
	/*
	  	$sqlList = "SELECT q.title FROM quizs q WHERE q.user_id = '$userId'";
		$statementList = $pdo->prepare($sqlList);
		$statementList->execute();
		$resultList = $statementList->fetchAll(PDO::FETCH_COLUMN, 0);
	*/
		$selected = '';
		echo '<select name="quizs">',"n";
		foreach($resultList as $key => $titleQuiz)
		{
			echo "\t",'<option value="', $key ,'"', $selected ,'>', $titleQuiz ,'</option>',"\n";
		}
			echo '</select>',"\n";
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
	/*
			$sqlUserQuiz = "SELECT s.score FROM sessions s  
			WHERE (s.id = '$sessionId')";
			$statementUserQuiz = $this->dbh->prepare($sqlUserQuiz);
			$statementUserQuiz->execute();
			$resultUserQuiz = $statementUserQuiz->fetchAll();
	*/
		}

	public function calculNoteAll()
		{
			$this->table = 'sessions';
			$resultAll = $this->findAll('score', 'DESC');
			return $resultAll;
			
		/*	$sqlUserQuiz = "SELECT s.score FROM sessions s";
			$statementUserQuiz = $this->dbh->prepare($sqlUserQuiz);
			$statementUserQuiz->execute();
			$resultUserQuiz = $statementUserQuiz->fetchAll();
		*/
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
		



	/*
		$answer = new \AnswerManager;
		$result = $answer->chp_table_id_find($champ, $table, $id);
		$results = $answer->studentSessionResult($sessionId, $userId);
	*/


		public function student_score_record($user, $session, $scor)
		{
			$sql = "UPDATE sessions SET score = '$scor' WHERE id = '$session' AND user_id = '$user'";
			$sth = $this->dbh->prepare($sql);
			$sth->execute();
		}

}

