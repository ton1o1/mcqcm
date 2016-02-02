<?php
namespace Manager;

class SkillManager extends \W\Manager\Manager 
{
    /**
     * Find skills by tag
     * @return array
     */
    public function findByTag($query, $page)
    {
        $offSet = 0;

        if($page > 1){
            $offSet = ($page - 1) * 30;
        }

        $sql = "SELECT * FROM " . $this->table . " WHERE tag LIKE :tag ORDER BY tag ASC LIMIT " . $offSet . ", 30";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":tag", "%" . $query . "%");
        $sth->execute();

        return $sth->fetchAll();
    }

    public function findExactTag($query)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE tag = :tag LIMIT 1";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":tag", $query);
        $sth->execute();

        return $sth->fetch();
    }

    public function lastId(){
        return $this->dbh->lastInsertId();
    }
}