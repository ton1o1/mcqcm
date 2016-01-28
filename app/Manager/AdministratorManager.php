<?php
namespace Manager;

class AdministratorManager extends \W\Manager\UserManager 
{
	public function getUserList(){
		
		$this->setTable("users");
		return $this->findAll("last_name", "ASC");		
	}


    public function setUserStatus($status, $userId){
        $this->setTable("users");
        $this->update(["is_active"  => $status],$userId);
    }

}
