<?php

class DBConnection
{
  private $host = 'localhost:3306';
  private $database = 'slimapi';
  private $username = 'root';
  private $password = 'wp6883';

  public function mConnect(){
    $conn_mysql = "mysql:host=$this->host;dbname=$this->database";
    $connDB = new PDO($conn_mysql, $this->username, $this->password);
    $connDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $connDB -> exec("set names uft8");

    return $connDB;
  }

}
