<?php
	
	$w_routes = array(
		//route to homepage
		['GET', '/', 'Default#home', 'home'],

		//route to question form builder
		['GET|POST', '/questionediteur', 'Question#questionBuild', 'question_build'],
		//route to question list 
		['GET', '/questionliste', 'Question#questionList', 'question_list'],
		//route to question search
		['GET', '/questionrecherche', 'Question#questionSearch', 'question_search'],
		
		//route to a question file
		['GET', '/question/[i:id]', 'Question#questionConsult', 'question_consult'],
		//route to about, legal and blog
		['GET', '/apropos', 'Default#about', 'about'],
		['GET', '/mentionslegales', 'Default#legal', 'legal'],
		['GET', '/blog', 'Default#blog', 'blog'],

		['GET', '/quiz/[i:quizId]?', 'Quiz#view', 'quiz_view'],
		['GET', '/quiz/user/[i:userId]', 'Quiz#viewByUser', 'quiz_view_user'],
		['GET|POST', '/quiz/create', 'Quiz#create', 'quiz_create'],
		['GET|POST', '/quiz/edit/[i:quizId]', 'Quiz#edit', 'quiz_edit'],
		['GET|POST', '/quiz/delete/[i:quizId]', 'Quiz#delete', 'quiz_delete'],

	);