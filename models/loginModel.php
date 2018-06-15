<?php

class LoginModel {
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
    public function verifyLogin($username, $password){
        //echo $username . " " . $password;
        $query = "SELECT count(*) FROM users where username = ? and password = ?";
        $statement = $this->conn->prepare($query);
        $statement->execute([$username,$password]);
        $numar = 0;
        while ($row = $statement->fetch()) {
            $numar = (int)$row[0];
        }
        return $numar;
    }
}


?>
