<?php

  
    $w_routes = array(


        // Global (Default)
        ['GET', '/', 'Default#home', 'home'], // homepage
        ['GET', '/about', 'Default#about', 'about'],
        ['GET', '/about', 'Default#apropos', 'apropos'],
        ['GET', '/legal', 'Default#legal', 'legal'],
        ['GET', '/contact', 'Default#contact', 'contact'],
        ['GET', '/', 'Default#home', 'question_builder'],

        // User
        ['GET|POST', '/login', 'User#login', 'user_login'],                           // login with credentials (email + password)
        ['GET|POST', '/logout', 'User#logout', 'user_logout'],

        ['GET|POST', '/register', 'User#register', 'user_register'],                  // register (email + password + passwordRepeat [+ captcha])
        ['GET|POST', '/reset-password', 'User#resetPassword', 'user_reset_password'], // reset password (email [+ captcha])
        ['GET', '/user/dashboard', 'User#dashboard', 'user_dashboard'],               // display user dashboard
        ['GET|POST', '/user/profile', 'User#profile', 'user_profile'],                // display profile, modify / delete account
        

        // Quiz
        ['GET', '/quiz/search', 'Quiz#search', 'quiz_search'],                        // search quizzes by skills (POST data received with ajax requests, submitted by homepage form)
        ['GET', '/quiz/view/[i:quizId]?/[:quizSlug]?', 'Quiz#view', 'quiz_view'],     // list all or view one by id
        ['GET', '/quiz/user', 'Quiz#viewByUser', 'quiz_view_user'],        // list all quizzes created by user id
        ['GET|POST', '/quiz/create', 'Quiz#create', 'quiz_create'],                   // manual creator
        ['GET|POST', '/quiz/edit/[i:quizId]', 'Quiz#edit', 'quiz_edit'],              // edit quiz by id
        ['GET|POST', '/quiz/edit/[i:quizId]/question/edit/[i:questionId]', 'Quiz#editQuestion', 'quiz_edit_question'],
        ['GET|POST', '/quiz/edit/[i:quizId]/question/delete/[i:questionId]', 'Quiz#deleteQuestion', 'quiz_delete_question'],
        ['GET|POST', '/quiz/delete/[i:quizId]', 'Quiz#delete', 'quiz_delete'],        // delete quiz by id



		//Private area
		['GET|POST', '/profil/modifier/', 'User#modify', 'user_modify'],
		['GET|POST', '/oubli-mdp/', 'User#recovery_pwd', 'user_recovery_pwd'],
		['GET|POST', '/renouvellement-mdp/[a:token]/[*:userEmail]/', 'User#renew_pwd', 'user_renew_pwd'],

		//Administrator only area
		['GET|POST', '/administrator/', 'Administrator#profil', 'administrator_profile'],
		['POST', '/administrator/set-user-status/', 'Administrator#setUserStatus', 'administrator_setUserStatus'],
		['POST', '/administrator/change-user/', 'Administrator#changeUser', 'administrator_changeUser'],
		['GET|POST', '/administrator/search/', 'Administrator#findUsers', 'administrator_findUsers'],
		['GET', '/administrator/find-user/', 'Administrator#getUserInfo', 'administrator_getUserInfo'],


       // Skill
        ['POST', '/skill/search', 'Skill#search', 'skill_search'],          // search skills by tag (POST data received with ajax requests, submitted by homepage form)

        // Question
        //['GET|POST', '/question/create', 'Question#create', 'question_create'],

        
        // Session

        // Questions
        ['GET|POST', '/question/create/quiz/[i:quizId]', 'Question#create', 'question_create'],
        ['GET|POST', '/question/[i:questionId]/edit', 'Question#edit', 'question_edit'],
        ['GET|POST', '/question/[i:questionId]/delete', 'Question#delete', 'question_delete'],


        // Answers

        ['POST', '/answers/session/[i:sessionId]/save', 'Session#save', 'session_save'], // save answers during session (POST data received with ajax requests, submitted by session_play page)
        //['POST', '/answers/session/[i:sessionId]/close', 'Session#close', 'session_close'], // save answers and close session (set date_stop in sessions table and redirect to result_view route)

        ['GET', '/session/play/[i:quizId]', 'Session#play', 'session_play'], // dynamic session interface to play a quiz by id
        // V2.0 ['POST', '/session/save', 'Session#save', 'session_save'], // save answers during session (POST data received with ajax requests, submitted by session_play page)
        ['POST', '/session/close', 'Session#close', 'session_close'],


        // Result

        ['GET', '/result/input/[i:userId]?/[i:sessionId]?', 'Result#viewInput', 'result_view_input'],
        ['GET', '/result/user/[i:userId]/[i:sessionId]', 'Result#viewUser', 'result_view_session'],
        ['GET', '/result/individual/[i:userId]', 'Result#viewIndividual', 'result_view_individual'],
        ['GET', '/result/quiz/[i:quizId]?', 'Result#viewQuiz', 'result_view_quiz'],


        //Question bis Area
		//route to question form builder
		['GET|POST', '/questionediteur/[i:quizId]', 'Question#questionBuild', 'question_build'],
		//route to question list 
		['GET', '/questionliste', 'Question#questionList', 'question_list'],
		//route to question search
		['GET', '/questionrecherche', 'Question#questionSearch', 'question_search'],
		//route to add question via the list with ajax
		['POST', '/questionajouter', 'Question#ajaxAddQuestion', 'question_add'],
		//route to a question file
		['GET', '/question/[i:id]', 'Question#questionConsult', 'question_consult'],
		//route to admin generate data page using Faker
		['GET|POST', '/admin/datagenerer', 'Data#dataGenerate', 'data_generate'],





    );

