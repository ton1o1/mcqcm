<?php
namespace Manager;

class ChoiceManager extends \W\Manager\Manager 
{

    /**
     * Find active choices by quiz_id
     * @param  integer $quizId
     * @return mixed (array or boolean : false)
     */

    public function findChoiceByQuestionId($question_id)
    {
        if (!is_numeric($id)){
            return false;
        }
    
        $sql = "SELECT * FROM " . $this->table . " WHERE question_id = :id";
        //echo $sql;
        $sth = $this->dbh->prepare($sql);
        $sth->execute([":id" => $id]);
        
        return $sth->fetchAll();
    }



}