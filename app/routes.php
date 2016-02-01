<?php
	
	$w_routes = array(
		//public area
		['GET', '/', 'Default#home', 'home'],
		['GET', '/', 'Default#home', 'question_builder'],
		['GET', '/', 'Default#home', 'apropos'],
		['GET', '/', 'Default#home', 'contact'],
		['GET', '/', 'Default#home', 'legalnotice'],

		//Private area
		['GET|POST', '/connexion/', 'User#login', 'user_login'],
		['GET|POST', '/inscription/', 'User#register', 'user_register'],
		['GET|POST', '/profil/', 'User#profile', 'user_profile'],
		['GET', '/deconnexion/', 'User#logout', 'user_logout'],
		['GET|POST', '/profil/modifier/', 'User#modify', 'user_modify'],
		['GET|POST', '/oubli-mdp/', 'User#recovery_pwd', 'user_recovery_pwd'],
		['GET|POST', '/renouvellement-mdp/[a:token]/[*:userEmail]/', 'User#renew_pwd', 'user_renew_pwd'],

		//Administrator only
		['GET|POST', '/administrator/', 'Administrator#profil', 'administrator_profile'],
		//Change user status
		['POST', '/administrator/set-user-status/', 'Administrator#setUserStatus', 'administrator_setUserStatus'],
		//List User 
		['GET|POST', '/administrator/search/', 'Administrator#findUsers', 'administrator_findUsers'],
		//List User 
		['GET', '/administrator/find-user/', 'Administrator#getUserInfo', 'administrator_getUserInfo']


	);