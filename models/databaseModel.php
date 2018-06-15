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

    public function getQuestions($level, $category){
          $query = "SELECT question, ans1, ans2, ans3, ans FROM questions where level = ? and category = ?";
          $statement = $this->conn->prepare($query);
          $statement->execute([$level, $category]);
          $ans = array();
          $i = 0;
          while ($row = $statement->fetch()) {
              $ans[$i] = $row['question'];
              $ans[$i+1] = $row['ans1'];
              $ans[$i+2] = $row['ans2'];
              $ans[$i+3] = $row['ans3'];
              $ans[$i+4] = $row['ans'];
              $i = $i + 5;
          }
          //echo $i;
          return $ans;
    }
}


?>
