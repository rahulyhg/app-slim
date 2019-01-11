
<!DOCTYPE html>
  <head>
    <title>Login</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
      .container{
        margin-top:100px;
        width: 40%;
        border-radius: 5%;
        border: 1px solid gray;
        padding: 30px;
        }
        .p-title {
          text-align: center;
          font-size: 25px;
          font-weight: 600;
          
        }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="p-title">
        <p>Log In</p>
      </div>
      <?php if ($_GET['error']) {?>
        <div class="alert alert-danger" role="alert">Usuario o contraseña invalido!</div>
      <?php } ?>
      <form class="form-horizontal" action="/php/login.php" method="post">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Sign in</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>