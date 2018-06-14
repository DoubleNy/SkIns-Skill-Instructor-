<?php

class DatabaseModel {
    public $conn;
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
            echo "Conectat cu succes!";
            return $pdo;
        } catch (PDOException $e) {
            echo "Conectarea la baza de date a esuat." . $e->getMessage();
        }
    }
    public function insertVideo($category, $videoID){
        $query = "SELECT count(*) FROM videos where category = ? and id = ?";
        $statement = $this->conn->prepare($query);
        $statement->execute([$category,$videoID]);
        $numar = 0;
        while ($row = $statement->fetch()) {
            $numar = (int)$row[0];
        }
        //
        if($numar == 0){
            $nrviews = 1;
            $query = "insert into videos (category, id, nrviews) values ('" . $category . "', '" . $videoID . "', '" . $nrviews . "')";
  	        $statement = $this->conn->prepare($query);
  	        $statement->execute();
        }
        else {
          $query = "SELECT nrviews FROM videos where category = ? and id = ?";
          $statement = $this->conn->prepare($query);
          $statement->execute([$category,$videoID]);
          $numarviews = 0;
          while ($row = $statement->fetch()) {
              $numarviews = (int)$row[0];
          }
          $numarviews = $numarviews + 1;
          //echo $numarviews;
          $query = "update videos set nrviews = " . $numarviews . " where category = ? and id = ?";
          $statement = $this->conn->prepare($query);
          $statement->execute([$category,$videoID]);
        }
    }

    public function executeSelect($query){
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }

    public function executeinsert($query){
        //echo $username . " " . $password;
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $numar = 0;
        return $numar;

    }
}


?>
