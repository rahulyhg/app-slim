<?php
  session_start();
  $ch = curl_init();

  $email = $_POST['email'];
  $password = $_POST['password'];

  curl_setopt($ch, CURLOPT_URL,"http://localhost:3000/login");
  curl_setopt($ch, CURLOPT_POST, TRUE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "email=$email&password=$password");

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $remote_server_output = curl_exec ($ch);

  curl_close ($ch);

  $user = strrpos($remote_server_output, '200');

  if ($user) {
    $_SESSION['email'] = $email;
    header("Location: http://localhost:3001/dashboard.php");
  } else {

    function setTimeout($fn, $timeout){
      sleep(($timeout/1000));
      $fn();
    }
    
    function someFunctionToExecute(){
        header("Location: http://localhost:3001/login.html");
        exit();
    }

    setTimeout(function(){
      someFunctionToExecute();
    }, 3000);

  }
?>