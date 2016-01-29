<?php
namespace Manager;

class QuizManager extends \W\Manager\Manager 
{
    /**
     * Find quizzes by user id
     * @param  integer $userId
     * @return array
     */
    public function findByUserId($userId)
    {
        if (!is_numeric($userId)){
            return false;
        }

        $sql = "SELECT * FROM " . $this->table . " WHERE creator_id = :userId ORDER BY id DESC";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":userId", $userId);
        $sth->execute();

        return $sth->fetchAll();
    }

    /**
     * Find active quiz by id
     * @param  integer $quizId
     * @return mixed
     */
    public function findActive($quizId)
    {
        if (!is_numeric($quizId)){
            return false;
        }

        $sql = "SELECT * FROM " . $this->table . " WHERE $this->primaryKey = :quizId AND is_active = :isActive LIMIT 1";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":quizId", $quizId);
        $sth->bindValue(":isActive", true);
        $sth->execute();

        return $sth->fetch();
    }

    /**
     * Find all active quizzes
     * @param  $orderBy
     * @param  $orderDir
     * @return array
     */
    public function findAllActive($orderBy = "", $orderDir = "ASC")
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE is_active = :isActive";

        if (!empty($orderBy)){

            //sécurisation des paramètres, pour éviter les injections SQL
            if(!preg_match("#^[a-zA-Z0-9_$]+$#", $orderBy)){
                die("invalid orderBy param");
            }
            $orderDir = strtoupper($orderDir);
            if($orderDir != "ASC" && $orderDir != "DESC"){
                die("invalid orderDir param");
            }

            $sql .= " ORDER BY $orderBy $orderDir";
        }
        
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":isActive", true);
        $sth->execute();

        return $sth->fetchAll();
    }

    public function findAllByTags($tags)
    {
        foreach($tags as $skill){
            $in .= $skill . ',';
        }

        $sql = "SELECT * FROM " . $this->table . ", quizskills WHERE quizs.is_active = :isActive AND quizskills.quiz_id = quizs.id AND quizskills.skill_id IN(" . $in . ") ORDER BY quizs.id DESC";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":isActive", true);
        $sth->execute();

        return $sth->fetchAll();
    }

    public function lastId()
    {
        return $this->dbh->lastInsertId();
    }
}