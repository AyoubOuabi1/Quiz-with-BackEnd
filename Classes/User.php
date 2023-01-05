<?php

class User
{
    private $id;
    private $score;
    private $operatingSystem;
    private $browser;
    private $adressIp;

    /**
     * @param $id
     * @param $score
     * @param $operatingSystem
     * @param $browser
     * @param $adressIp
     */
    public function __construct($id, $score, $operatingSystem, $browser, $adressIp)
    {
        $this->id = $id;
        $this->score = $score;
        $this->operatingSystem = $operatingSystem;
        $this->browser = $browser;
        $this->adressIp = $adressIp;
    }


    static function checkUser($userName,$password) : bool{
        $cnct=DbConnection::connect();
        $stmt=$cnct->prepare("SELECT * FROM userr WHERE username ='$userName' and password ='$password'");
        $stmt->execute();
        if ($stmt->rowCount()){
            session_start();
            $_SESSION['userData'] = $stmt->fetch(PDO::FETCH_ASSOC);
            $cnct=null;
            return true;
        }
        $cnct=null;
        return false;
    }
    function updateUser() : bool{
        $cnct=DbConnection::connect();

        $qry=$cnct->prepare("SELECT score from userr WHERE id =$this->id");
        $qry->execute();
        $oldScore=$qry->fetch(PDO::FETCH_ASSOC);
        $old=$oldScore['score'];
        if($old>=$this->score){
            $stmt = $cnct->prepare("update userr set score=$old,operatingSystem='$this->operatingSystem',date=SYSDATE(),browser='$this->browser',adressIp='$this->adressIp' where id = $this->id");


        }else{
            $stmt = $cnct->prepare("update userr set score=$this->score,operatingSystem='$this->operatingSystem',date=SYSDATE(),browser='$this->browser',adressIp='$this->adressIp' where id = $this->id");
        }
        $stmt->execute();
        if($stmt->rowCount()){
            $cnct=null;
            return true;
        }
        $cnct=null;
        return false;
    }
    static function getMaxScore($id) : array {
        $cnct=DbConnection::connect();
        $stmt=$cnct->prepare("select score from userr where id = $id");
        $stmt->execute();
        $cnct=null;
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}