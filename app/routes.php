<?php
	
	$w_routes = array(
		//route to homepage
		['GET', '/', 'Default#home', 'home'],
		//route to question form builder
		['GET|POST', '/question-build', 'Question#questionBuild', 'question_build'],
	);