<?php
namespace Manager;

class SkillManager extends \W\Manager\Manager 
{
    /**
     * Find skills by tag
     * @return array
     */
    public function findByTag()
    {
        $offSet = 0;

        if(!empty($_POST['page'])){
            
            $page = (int) $_POST['page'];

            if($page > 1){
                $offSet = ($page - 1) * 30;
            }
        }

        $sql = "SELECT * FROM " . $this->table . " WHERE tag LIKE :tag ORDER BY tag ASC LIMIT " . $offSet . ", 30";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":tag", "%" . $_POST['q'] . "%");
        $sth->execute();

        return $sth->fetchAll();
    }

    public function lastId(){
        return $this->dbh->lastInsertId();
    }
}