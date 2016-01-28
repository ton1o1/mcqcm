<?php
namespace Manager;

class Quizs__questionManager extends \W\Manager\Manager 
{

    /**
     * Find active choices by quiz_id
     * @param  integer $quizId
     * @return mixed (array or boolean : false)
     */

    public function findQuizIdBy($question_id)
    {
        if (!is_numeric($question_id)){
            return false;
        }
    
        $sql = "SELECT * FROM quizs__questions" . " WHERE question_id = $question_id";
        //echo $sql;
        $sth = $this->dbh->prepare($sql);
        $sth->execute([]);
        
        return $sth->fetchAll();
    }

}