<?php

class User
{
    private $id;
    private $userName;
    private $password;
    private $score;
    private $operatingSystem;
    private $date;
    private $browser;
    private $adressIp;

    /**
     * @param $id
     * @param $score
     * @param $operatingSystem
     * @param $date
     * @param $browser
     * @param $adressIp
     */
    public function __construct($id, $score, $operatingSystem, $date, $browser, $adressIp)
    {
        $this->id = $id;
        $this->score = $score;
        $this->operatingSystem = $operatingSystem;
        $this->date = $date;
        $this->browser = $browser;
        $this->adressIp = $adressIp;
    }


    static function checkUser($userName,$password) : bool{
        $cnct=DbConnection::connect();
        $stmt=$cnct->prepare("SELECT id FROM user WHERE username ='$userName' and password ='$password'");
        $stmt->execute();
        if ($stmt->rowCount()){
            session_start();
            $_SESSION['id'] = $stmt->fetch();
            $cnct=null;
            return true;
        }
        $cnct=null;
        return false;

    }
    function insertUser() : bool{
        $cnct=DbConnection::connect();
        $stmt = $cnct->prepare("update user set score=$this->score,operatingSystem=$this->operatingSystem,date=$this->date,browser=$this->browser,adressIp=$this->adressIp where id = $this->id");
        $stmt->execute();
        if($stmt->rowCount()){
            $cnct=null;
            return true;
        }
        $cnct=null;
        return false;
    }

    static function getMaxScore() : array {
        $cnct=DbConnection::connect();
        $stmt=$cnct->prepare("select username from user order by score desc limit 1");
        $stmt->execute();
        $cnct=null;
        return $stmt->fetch();
    }
}