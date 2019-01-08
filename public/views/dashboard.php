
<!DOCTYPE html>
  <head>
    <title>Dashboard</title>
    <meta name="viewport" content="initial-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
      </ul>
        <div class="jumbotron" style="margin-top: 50px;">
          <h1 class="display-4">Prueba técnica Backend Developer</h1>
          <p class="lead">CRUD de usuarios - Framework Slim</p>
          <hr class="my-4">
          <p>La implementación debe realizarse mediante una API en REST con la utilización de sus métodos
            (GET, POST, PUT y DELETE) según convenga.</p>
        </div>
      </div>
  </body>
</html>