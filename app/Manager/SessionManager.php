<?php
namespace Manager;

class SessionManager extends \W\Manager\Manager 
{
    public function lastId()
    {
        return $this->dbh->lastInsertId();
    }
}