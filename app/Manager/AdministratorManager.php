<?php
namespace Manager;

class AdministratorManager extends \W\Manager\UserManager 
{
	public function getUserList($from = 0,$offset = 5){
		
		$this->setTable("users");
        $sql = "SELECT * FROM ".$this->table." ORDER BY last_name ASC LIMIT ". $from . ",". $offset;
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();

	}



    public function searchUser($search){

        $this->setTable("users");
        
        $sql = "SELECT * FROM ".$this->table." WHERE email LIKE :email OR last_name LIKE :lastName OR first_name LIKE :firstName";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":email", "%".$search."%");
        $sth->bindValue(":lastName", "%".$search."%");
        $sth->bindValue(":firstName", "%".$search."%");
        $sth->execute();

        return $sth->fetchAll();

    }

    public function setUserStatus($status, $userId){

        $this->setTable("users");
        $this->update(["is_active"  => $status],$userId);


    }

    public function setUserRole($role, $userId){
        
        $this->setTable("users");
        $this->update(["role"  => $role],$userId);

    }
}
