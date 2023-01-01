<?php

class Question
{
    private $id;
    private $question;
    private $choice1;
    private $choice2;
    private $choice3;
    private $choice4;
    private $correctAnswer;
    static function getQuestions() : array{
        $cnct=DbConnection::connect();
        $stmt = $cnct->prepare("select * from questions");
        $stmt->execute();
        $cnct=null;
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}