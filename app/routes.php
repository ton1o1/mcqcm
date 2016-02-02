<?php
	
	$w_routes = array(

		//route to homepage
		['GET', '/', 'Default#home', 'home'],
		['GET', '/', 'Default#home', 'question_builder'],
		['GET', '/', 'Default#home', 'apropos'],
		['GET', '/', 'Default#home', 'contact'],
		['GET', '/', 'Default#home', 'legalnotice'],

		//route to question form builder
		['GET|POST', '/question-build', 'Question#questionBuild', 'question_build'],
		//route to question list 
		['GET', '/question-list', 'Question#questionList', 'question_list'],
		//route to a question file
		['GET', '/question/[i:id]', 'Question#questionConsult', 'question_consult'],
		//route to about, legal and blog
		['GET', '/about', 'Default#about', 'about'],
		['GET', '/legal-notices', 'Default#legal', 'legal'],
		['GET', '/blog', 'Default#blog', 'blog'],

		['GET', '/quiz/[i:quizId]?', 'Quiz#view', 'quiz_view'],
		['GET', '/quiz/user/[i:userId]', 'Quiz#viewByUser', 'quiz_view_user'],
		['GET|POST', '/quiz/create', 'Quiz#create', 'quiz_create'],
		['GET|POST', '/quiz/edit/[i:quizId]', 'Quiz#edit', 'quiz_edit'],
		['GET|POST', '/quiz/delete/[i:quizId]', 'Quiz#delete', 'quiz_delete'],

		//Login
		['GET|POST', '/connexion/', 'User#login', 'user_login'],
		//Private area
		['GET|POST', '/inscription/', 'User#register', 'user_register'],
		['GET|POST', '/profil/', 'User#profile', 'user_profile'],
		['GET', '/deconnexion/', 'User#logout', 'user_logout'],
		['GET|POST', '/profil/modifier/', 'User#modify', 'user_modify'],
		['GET|POST', '/oubli-mdp/', 'User#recovery_pwd', 'user_recovery_pwd'],
		['GET|POST', '/renouvellement-mdp/[a:token]/[*:userEmail]/', 'User#renew_pwd', 'user_renew_pwd'],

		//Administrator only area
		['GET|POST', '/administrator/', 'Administrator#profil', 'administrator_profile'],
		['POST', '/administrator/set-user-status/', 'Administrator#setUserStatus', 'administrator_setUserStatus'],
		['POST', '/administrator/change-user/', 'Administrator#changeUser', 'administrator_changeUser'],
		['GET|POST', '/administrator/search/', 'Administrator#findUsers', 'administrator_findUsers'],
		['GET', '/administrator/find-user/', 'Administrator#getUserInfo', 'administrator_getUserInfo']


	);