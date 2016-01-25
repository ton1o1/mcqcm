<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET', '/quiz/[i:quizId]?', 'Quiz#view', 'quiz_view'],
		['GET', '/quiz/user/[i:userId]', 'Quiz#viewByUser', 'quiz_view_user'],
		['GET|POST', '/quiz/create', 'Quiz#create', 'quiz_create'],
	);