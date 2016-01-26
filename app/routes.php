<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET|POST', '/answer/input', 'Default#answerinput', 'answer_input'],
		['GET|POST', '/answer/calculate/[i:quizId][j:userId]?', 'Default#answerviewer', 'answer_results'],
		['GET|POST', '/answer/[i:quizId][j:userId]?', 'Default#answerviewerresults', 'answer_view'],
	);
	