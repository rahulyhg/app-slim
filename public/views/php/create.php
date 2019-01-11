<?php
  session_start();
  $ch = curl_init();

  $email = $_POST['email'];
  $password = $_POST['password'];
  $username = $_POST['username'];

  curl_setopt($ch, CURLOPT_URL,"https://api-slim-staging.herokuapp.com/api/v1/user");
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, "email=$email&password=$password&username=$username");

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $remote_server_output = curl_exec ($ch);

  curl_close ($ch);

  $users = strrpos($remote_server_output, 'id');
  header("Location: http://localhost:3001/php/list.php");
  exit();
?>