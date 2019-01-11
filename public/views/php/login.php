<?php
  session_start();
  $ch = curl_init();

  $email = $_POST['email'];
  $password = $_POST['password'];

  curl_setopt($ch, CURLOPT_URL,"https://api-slim-staging.herokuapp.com/login");
  curl_setopt($ch, CURLOPT_POST, TRUE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "email=$email&password=$password");

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $remote_server_output = curl_exec ($ch);

  curl_close ($ch);

  $user = strrpos($remote_server_output, '200');

  if ($user) {
    $_SESSION['email'] = $email;
    header("Location: http://app-slim.herokuapp.com/dashboard.html");
  } else {

    function setTimeout($fn, $timeout){
      sleep(($timeout/1000));
      $fn();
    }
    
    function someFunctionToExecute(){
        header("Location: http://app-slim.herokuapp.com/index.html");
        exit();
    }

    setTimeout(function(){
      someFunctionToExecute();
    }, 3000);

  }
?>