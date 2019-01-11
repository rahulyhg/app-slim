<?php

class DBConnection
{
  public function mConnect(){
    $conn_mysql = "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']}";
    
    $connDB = new PDO($conn_mysql, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $connDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $connDB -> exec("set names uft8");

    return $connDB;
  }

}
