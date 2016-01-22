<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET', '/quiz/[i:userId]?', 'Quiz#explore', 'quiz'],
	);