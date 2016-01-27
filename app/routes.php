<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET|POST', 'student/session/result/[i:session_id][i:user_id]?', 'Answer#studentSessionResult', 'answer_student_session_view'], //route à faire en priorité
		['GET|POST', 'teacher/session/result/[i:session_id]?', 'Answer#teacherSessionResult', 'answer_teacher_session_view'], //route à faire en priorité
		['GET|POST', 'student/results/[i:user_id]', 'Answer#studentResults', 'student_view'],
		['GET|POST', 'teacher/results/', 'Answer#teacherResults', 'teacher_view'],
		['GET|POST', 'results/', 'Answer#allResults', 'all_view'],
	);
	