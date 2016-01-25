<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET', '/', 'Default#home', 'question_builder'],
		['GET', '/', 'Default#home', 'apropos'],
		['GET', '/', 'Default#home', 'contact'],
		['GET', '/', 'Default#home', 'legalnotice'],
		['GET', '/admin/', 'User#login', 'user_login'],
		['GET', '/admin/inscription', 'User#register', 'user_register']
	);