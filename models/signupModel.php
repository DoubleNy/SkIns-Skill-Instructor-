<?php

class SignUpModel {
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
    public function insertUser($username, $password, $email){
        //echo $username . " " . $password;
        $query = "insert into users (username, email, password) values (?, ?, ?)";
        $statement = $this->conn->prepare($query);
        $statement->execute([$username, $email, $password]);
        $numar = 0;
        return $numar;
    }

    public function verifyUser($username){
        //echo $username . " " . $password;
        $query = "SELECT count(*) FROM users where username = ?";
        $statement = $this->conn->prepare($query);
        $statement->execute([$username]);
        $numar = 0;
        while ($row = $statement->fetch()) {
            $numar = (int)$row[0];
        }
        return $numar;
    }

    public function verifyEmail($email){
        //echo $username . " " . $password;
        $query = "SELECT count(*) FROM users where email = ?";
        $statement = $this->conn->prepare($query);
        $statement->execute([$email]);
        $numar = 0;
        while ($row = $statement->fetch()) {
            $numar = (int)$row[0];
        }
        return $numar;
    }
}


?>
