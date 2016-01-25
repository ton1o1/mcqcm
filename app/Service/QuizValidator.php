<?php

namespace Service;

class QuizValidator
{
    public function check($data)
    {
        $success = true;
        $errors = [];

        if(empty($data['title'])){
            $success = false;
            $errors['title'] = 'Le nom du quiz ne doit pas être vide.';
        }

        if(strlen($data['title']) > 255){
            $success = false;
            $errors['title'] = 'La taille maximale du nom du quiz est de 255 charactères.';
        }

        return $result = ['success' => $success, 'errors' => $errors];
    }
}