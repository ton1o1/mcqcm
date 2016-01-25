<?php
	
	$w_routes = array(
		//route to homepage
		['GET', '/', 'Default#home', 'home'],
		//route to question form builder
		['GET|POST', '/question-build', 'Question#questionBuild', 'question_build'],
		//route to question list 
		['GET', '/question-list', 'Question#questionList', 'question_list'],
		//route to a blog file
		// ['GET', '/question/[i:id]', 'Default#questionConsult', 'question_consult'],
		// //route to a question file
		// ['GET', '/question/[i:id]', 'Default#questionConsult', 'question_consult'],
	);