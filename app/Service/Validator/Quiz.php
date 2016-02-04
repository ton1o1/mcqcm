<?php

namespace Service\Validator;

use Respect\Validation\Validator;

class Quiz
{
    public function check($data)
    {
        $success = false;
        $errors = [];

        // title
        if(!Validator::stringType()->notEmpty()->validate($data['title'])){
            $errors['title'] = 'Le nom du quiz est requis.';
        }
        elseif(!Validator::stringType()->length(null, 255, true)->validate($data['title'])){
            $errors['title'] = 'Le nom du quiz est limité à 255 caractères.';
        }

        // description
        if(!Validator::stringType()->notEmpty()->validate($data['description'])){
            $errors['description'] = 'Veuillez décrire un minimum votre quiz !';
        }
        elseif(!Validator::stringType()->length(30, null, true)->validate($data['description'])){
            $errors['description'] = 'La description est trop courte, allez encore un petit effort pour aider la communauté à cerner votre quiz :)';
        }

        // skills
        if(empty($data['skills']) || !Validator::arrayVal()->notEmpty()->validate($data['skills'])){
            $errors['skills'] = 'Veuillez ajouter au moins 1 compétence.';
        }

        // If no errors found
        if(empty($errors)){
            $success = true;
        }

        return ['success' => $success, 'errors' => $errors];
    }
}