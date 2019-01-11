<?php

class DBConnection
{
  private $host = $_ENV['DB_HOST'];
  private $database = $_ENV['DB_DATABASE'];
  private $username = $_ENV['DB_USERNAME'];
  private $password = $_ENV['DB_PASSWORD'];

  public function mConnect(){
    $conn_mysql = "mysql:host=$this->host;dbname=$this->database";
    
    $connDB = new PDO($conn_mysql, $this->username, $this->password);
    $connDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $connDB -> exec("set names uft8");

    return $connDB;
  }

}
