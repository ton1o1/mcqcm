<?php
    
    $w_routes = array(

        // Global (Default)
        ['GET', '/', 'Default#home', 'home'], // homepage
        ['GET', '/about', 'Default#about', 'about'],
        ['GET', '/legal', 'Default#legal', 'legal'],
        ['GET', '/contact', 'Default#contact', 'contact'],

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
        ['GET', '/quiz/user/[i:userId]', 'Quiz#viewByUser', 'quiz_view_user'],        // list all quizzes created by user id
        ['GET|POST', '/quiz/create', 'Quiz#create', 'quiz_create'],                   // manual creator
        ['GET|POST', '/quiz/edit/[i:quizId]', 'Quiz#edit', 'quiz_edit'],              // edit quiz by id
        ['GET|POST', '/quiz/delete/[i:quizId]', 'Quiz#delete', 'quiz_delete'],        // delete quiz by id

        // Skill
        ['POST', '/skill/search', 'Skill#search', 'skill_search'],          // search skills by tag (POST data received with ajax requests, submitted by homepage form)

        // Question
        ['GET|POST', '/question/create/quiz/[i:quizId]', 'Question#create', 'question_create'],
        ['GET|POST', '/question/[i:questionId]/edit', 'Question#edit', 'question_edit'],
        ['GET|POST', '/question/[i:questionId]/delete', 'Question#delete', 'question_delete'],

        // Session
        ['GET', '/session/quiz/[i:quizId]', 'Session#play', 'session_play'], // dynamic session interface to play a quiz by id

        // Answer
        ['POST', '/answers/session/[i:sessionId]/save', 'Session#save', 'session_save'], // save answers during session (POST data received with ajax requests, submitted by session_play page)
        ['POST', '/answers/session/[i:sessionId]/close', 'Session#close', 'session_close'], // save answers and close session (set date_stop in sessions table and redirect to result_view route)

        // Result
        ['GET', '/result/session/[i:sessionId]', 'Result#viewSession', 'result_view_session'],
        ['GET', '/result/quiz/[i:quizId]?', 'Result#viewQuiz', 'result_view_quiz'],

    );