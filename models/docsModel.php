<?php
class docsModel{
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
          echo "Conectat cu succes!";
          return $pdo;
      } catch (PDOException $e) {
          echo "Conectarea la baza de date a esuat." . $e->getMessage();
      }

  }
  public function getDocuments($category)
  {

    $qwery="SELECT url from documents where category=? limit 5";
    $statement = $this->conn->prepare($query);
    $statement->execute([$category]);
    $documents=[];
    while ($row = $statement->fetch()) {
        $documents[]=$row[0];
    }
    return $documents;
  }
  public function validDocument($category,$document)
  {
    $qwery="SELECT count(*) from documents where category=? and url=?";
    $statement = $this->conn->prepare($query);
    $statement->execute([$category,$document]);
    $documents=[];
    $row = $statement->fetch())
    return $row[0];

  }
  }



}
?>
