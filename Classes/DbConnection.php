<?php

class DbConnection
{
    public static function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = null;
        try {
            $conn = new PDO('mysql:host='.$servername.';dbname=quizdb', $username, $password); // Persistent connection

            //$conn = new PDO("mysql:host=$servername;dbname=quizdb", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //setAttribute() method sets a new value to an attribute.
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die('db error');
        }
    }
}


