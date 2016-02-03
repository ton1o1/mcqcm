<?php
namespace Manager;

class Quizs__questionManager extends \W\Manager\Manager 
{

    /**
     * Find active choices by quiz_id
     * @param  integer $quizId
     * @return mixed (array or boolean : false)
     */


/**************************************************
    SELECT A QUIZ ACCORDING TO ITS ID
**************************************************/

    public function findQuizIdBy($question_id)
    {
        if (!is_numeric($question_id)){
            return false;
        }
        
        //usual process : sql, prepare, execute
        $sql = "SELECT * FROM quizs__questions" . " WHERE question_id = $question_id";
        //echo $sql;
        $sth = $this->dbh->prepare($sql);
        $sth->execute([]);
        
        return $sth->fetchAll();
    }

    


}   