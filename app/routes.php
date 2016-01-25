<?php
	
	$w_routes = array(
		//public area
		['GET', '/', 'Default#home', 'home'],
		['GET', '/', 'Default#home', 'question_builder'],
		['GET', '/', 'Default#home', 'apropos'],
		['GET', '/', 'Default#home', 'contact'],
		['GET', '/', 'Default#home', 'legalnotice'],

		//Private area
		['GET|POST', '/admin/connexion/', 'User#login', 'user_login'],
		['GET|POST', '/admin/inscription/', 'User#register', 'user_register'],
		['GET|POST', '/admin/profil/', 'User#profile', 'user_profile']
	);