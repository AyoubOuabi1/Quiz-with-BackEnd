<?php

class User
{
    private $userName;
    private $score;
    function __construct($userName, $score){
        $this->userName = $userName;
        $this->score = $score;
    }
    function insertUser(){
        $cnct=DbConnection::connection();
        $stmt = $cnct->prepare("INSERT INTO user values (null,$this->userName, $this->score)");
        if($stmt->execute()){
            $cnct=null;
            return true;
        }
        $cnct=null;
        return false;
    }

    static function getMaxScore(){
        $cnct=DbConnection::connection();
        $stmt=$cnct->prepare("select * from user order by score desc limit 1");
        $stmt->execute();
        $cnct=null;
        return $stmt->fetch();
    }
}