<?php

namespace Service\Validator;

use Respect\Validation\Validator;

class Quiz
{
    public function check($data)
    {
        $success = false;
        $errors = [];

        if(!Validator::stringType()->notEmpty()->length(1, 255, true)->validate($data['title'])){
            $errors['title'] = 'Le nom du quiz est requis (max. 255 charactères).';
        }

        // If no errors found
        if(empty($errors)){
            $success = true;
        }

        return ['success' => $success, 'errors' => $errors];
    }
}