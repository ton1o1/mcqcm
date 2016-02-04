<?php

namespace Manager;

class UserManager extends \W\Manager\UserManager 
{

   	//return 1 id if email/token couple exists
	public function findUserByTokenAndEmail($token, $email)
    {
        $sql = "SELECT id FROM " . $this->table . " WHERE token = :token AND email = :email LIMIT 1";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":token", $token);
         $sth->bindValue(":email", $email);
        $sth->execute();
        return $sth->fetchAll();
    }


    public function findUserByCookie($token)
    {
        $sql = "SELECT id, last_name, first_name, role, email, is_active FROM " . $this->table . " WHERE cookie = :token LIMIT 1";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":token", $token);
        $sth->execute();
        return $sth->fetch();
    }
}