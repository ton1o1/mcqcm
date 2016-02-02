<?php

namespace Service;

    Class Cookies
    {

        private $userManager;
        private $authentificationManager;
        
        public function __construct()
        {
            
            $this->userManager =  new \Manager\UserManager();
            $this->authentificationManager = new \W\Security\AuthentificationManager();

           // $this->cookieTester();

        }

        /**
         *  Test if autologin cookie exist & if 
         * @return [type] [description]
         */
        public function cookieTester()
        {
            if(!empty($_COOKIE['autologin'])){
                //test if autologin value correspont to a user
                $token = $_COOKIE['autologin'];
                $user = $this->userManager->findUserByCookie($token);
                if(!empty($user)){
                    
                    $this->authentificationManager->logUserIn($user);

                }
            }
        }

        /**
         * Create a cookie
         * @param  boolean $autoconnect : true if user checked 
         *                                remember me checkbox on login form 
         * @return string $key : random string stored in cookie
         */
        public function createCookie($autoconnect = false)
        {

            if($autoconnect) {
                //generate random string and set cookie
                $key = \W\Security\StringUtils::randomString(32);
                setcookie('autologin', $key, time() + 3600 * 24 * 365, '/', 'mcqcm.dev', false, true);

                return $key;
            }
        }

        /**
         * Suppress the autologin value cookie
         * @return [type] [description]
         */
        public function unsetCookie()
        {   
            $key = $_COOKIE['autologin'];
            unset($_COOKIE['autologin']);
            setcookie("autologin", "", 0 , '/', 'mcqcm.dev', false, true);
            //delete present value in the database

            return true;
        }


    }