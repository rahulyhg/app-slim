<?php
  session_start();
  $ch = curl_init();

  $id = $_POST['id'];

  curl_setopt($ch, CURLOPT_URL,"http://localhost:3000/api/v1/user/$id");
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $remote_server_output = curl_exec ($ch);

  curl_close ($ch);

  $users = strrpos($remote_server_output, 'id');
  header("Location: http://localhost:3001/php/list.php");
  exit();
?>