<?php
namespace Manager;

class SessionManager extends \W\Manager\Manager 
{
    public function questionsByQuizId($quizId)
    {
        $sql = "
        SELECT quizs.title AS quizTitle, questions.id AS questionId, questions.title AS questionTitle
        FROM quizs
        INNER JOIN quizs__questions AS qq
            ON quizs.id = qq.quiz_id
        INNER JOIN questions
            ON qq.question_id = questions.id
        WHERE quizs.id = :quizId
        AND qq.is_active = :isActive
        AND quizs.is_active = :isActive
        ";
        
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":quizId", $quizId);
        $sth->bindValue(":isActive", true);
        $sth->execute();

        return $sth->fetchAll();
    }

    public function choicesByQuestionId($questionId)
    {
        $sql = "
        SELECT choices.id AS choiceId, choices.title AS choiceTitle, choices.is_true AS isTrue
        FROM choices
        WHERE choices.question_id = :questionId
        AND choices.is_active = :isActive
        ";
        
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":questionId", $questionId);
        $sth->bindValue(":isActive", true);
        $sth->execute();

        return $sth->fetchAll();
    }

    public function lastId()
    {
        return $this->dbh->lastInsertId();
    }
}