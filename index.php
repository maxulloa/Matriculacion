<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Sistema de matriculación</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />
  </head>
  <body>

    <div class="page">
      <div class="container-fluid">
        <div class="login-page">
          <div class="text-center">
            <h1>Bienvenido</h1>
            <p>Iniciar sesión </p>
          </div>
          <form method="post" action="funciones/login.php" class="clearfix">
            <div class="form-group">
              <label for="username" class="control-label">Correo</label>
              <input type="name" class="form-control" name="correo" placeholder="Correo">
            </div>
            <div class="form-group">
              <label for="Password" class="control-label">Contraseña</label>
              <input type="password" name= "password" class="form-control" placeholder="Contraseña">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info  pull-right">Entrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="libs/js/functions.js"></script>

  </body>
</html>
