<?php
namespace Manager;

class UserManager extends \W\Manager\UserManager 
{

	public function findUserByToken($token)
    {

        $sql = "SELECT id FROM " . $this->table . " WHERE token = :token LIMIT 1";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":token", $token);
        $sth->execute();
        return $sth->fetchAll();
    }
}
