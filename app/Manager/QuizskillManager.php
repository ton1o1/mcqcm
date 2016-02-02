<?php
namespace Manager;

class QuizskillManager extends \W\Manager\Manager 
{
    public function lastId()
    {
        return $this->dbh->lastInsertId();
    }
}