<?php

class VideoSurvivalModel {
    protected $conn;
    public function __construct()
    {
        $this->conn = $this->makeConn('localhost','root','','myDb');
    }
    public function makeConn($host,$user,$pass,$name)
    {
        try{
            $pdo = new PDO("mysql:host=$host;dbname=$name", $user, $pass);
            $pdo->exec("set names utf8");
            $pdo->setAttribute(
              PDO::ATTR_ERRMODE,
              PDO::ERRMODE_EXCEPTION
            );
            return $pdo;
        } catch (PDOException $e) {
            echo "Conectarea la baza de date a esuat." . $e->getMessage();
        }

    }
    public function executeSelect($query){
        //echo $username . " " . $password;

        $statement = $this->conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        //print_r($result);
        return $result;
    }
    public function executeinsert($query){
        //echo $username . " " . $password;

        $statement = $this->conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        //print_r($result);
        return $result;
    }

}
