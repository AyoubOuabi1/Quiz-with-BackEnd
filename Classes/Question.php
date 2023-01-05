<?php

class Question
{

    static function getQuestions() : array{
        $cnct=DbConnection::connect();
        $stmt = $cnct->prepare("select * from questions");
        $stmt->execute();
        $cnct=null;
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}