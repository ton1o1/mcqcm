<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET|POST', '/answer/input', 'Answer#input', 'answer_input'],
		['GET|POST', '/answer/calculate', 'Answer#calculate', 'answer_results'],
		['GET|POST', '/answer/[i:quizId]?', 'Answer#view', 'answer_view'],
	);
	