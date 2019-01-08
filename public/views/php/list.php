<?php
  session_start();
  $ch = curl_init();

  $email = $_POST['email'];
  $password = $_POST['password'];

  curl_setopt($ch, CURLOPT_URL,"http://localhost:3000/api/v1/users");
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_POSTFIELDS, "email=$email&password=$password");

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $remote_server_output = curl_exec ($ch);

  curl_close ($ch);

  $users = strrpos($remote_server_output, 'id');

  if ($users) {
    $data = json_decode($remote_server_output);
    echo '<!DOCTYPE html>
    <head>
      <title>List</title>
      <meta name="viewport" content="initial-scale=1.0" />
      <meta charset="utf-8" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
      </head>
      <body>
        <div class="container">
        <ul class="nav nav-tabs item-center" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="/php/list.php" role="tab" aria-controls="home" aria-selected="true">Listar usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="/create.html" role="tab" aria-controls="home" aria-selected="true">Crear Usuario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="/update.html" role="tab" aria-controls="profile" aria-selected="false">Editar Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="/delete.html" role="tab" aria-controls="contact" aria-selected="false">Eliminar Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="/login.html" role="tab" aria-controls="contact" aria-selected="false">Cerrar sesion</a>
          </li>
        </ul>';
    for($i = 0; $i < count($data); ++$i) {

      echo '
        <div class="jumbotron" style="margin-top: 1px;">
        <div class="card" style="width: 70rem;">
        <div class="card-body">
          <h5 class="card-title"><strong>ID:</strong> ' . $data[$i]->{'id'}. "<strong> Nombre: </strong>". $data[$i]->{'username'} ."<strong> email: </strong>". $data[$i]->{'email'} .'</h5>
        </div>
      </div>
         </div>
        </body>
        </html>
    ';
    }
  } else {

  }
?>