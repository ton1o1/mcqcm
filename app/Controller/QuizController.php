<?php

namespace Controller;

use \W\Controller\Controller;
use Manager\QuizManager;

class QuizController extends Controller
{

	/**
	 * List all the quizzes or search quiz by user id if given
	 */
	public function explore($userId = null)
	{
		$QuizManager = new QuizManager();

		// Our table names are not plural, so we set a custom table name
		$QuizManager->setTable('quiz');

		if($userId){
			$quizzes = $QuizManager->findByUserId($userId);
		}
		else{
			$orderBy = 'id';
			$orderDir = 'DESC'; //Display newer first
			$quizzes = $QuizManager->findAll($orderBy, $orderDir);
		}

		var_dump($quizzes);
		// $this->show('quiz/explore', ['quizzes' => $quizzes]);
	}

}