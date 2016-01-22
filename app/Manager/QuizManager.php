<?php
namespace Manager;

class QuizManager extends \W\Manager\Manager 
{
    /**
     * Find quizzes by user id
     */
    public function findByUserId($userId)
    {
        if (!is_numeric($userId)){
            return false;
        }

        $sql = "SELECT * FROM " . $this->table . " WHERE user_id = :userId ORDER BY id DESC";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":userId", $userId);
        $sth->execute();

        return $sth->fetch();
    }
}