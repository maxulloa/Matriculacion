<?php
  session_start();
  if(isset($_SESSION['id'])) {
    $rol = $_SESSION['rol'];
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $ncompleto = $nombre." ".$apellido;
  }
  if ($rol == "Administrador") {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Administrador</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="libs/js/functions.js"></script>
    <script type="text/javascript" src="funciones/javascript/funcionesAgregarAdministrador.js"></script>

  </head>

  <body>
    <?php
      include("includes/headerAdministrador.php");
      include("includes/menuAdministrador.php");
    ?>

  <div class="page">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-6">
        </div>
      </div>

      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
          <div class="panel panel-default">
            <div class="panel-heading clearfix">
              <span class="glyphicon glyphicon-edit"></span>
              <span>Agregar Administrador</span>
            </div>
            <div class="panel-body">
              <div id="msgDataIncompleta" class="alert alert-danger" role="alert" style='display:none;'>
                Por favor ingrese todos los datos.
              </div>
              <div id="msgDataNoActualizada" class="alert alert-danger" role="alert" style='display:none;'>
                No se a podido registrar el usuario.
              </div>
              <div id="msgCedulaInvalida" class="alert alert-danger" role="alert" style='display:none;'>
                La cédula ingresada no es la correcta.
              </div>
              <div id="msgDataActualizada" class="alert alert-success" role="alert" style='display:none;'>
                El usuario se a registrado correctamente.
              </div>
              <div class="form-group">
                <label for="cedula" class="control-label">Cédula</label>
                <input type="name" class="form-control" id="cedula" name="cedula" value="">
              </div>
              <div class="form-group">
                <label for="nombre" class="control-label">Nombre</label>
                <input type="name" class="form-control" id="nombre" name="nombre" value="">
              </div>
              <div class="form-group">
                <label for="apellido" class="control-label">Apellido</label>
                <input type="name" class="form-control" id="apellido" name="apellido" value="">
              </div>
              <div class="form-group">
                <label for="correo" class="control-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" value="">
              </div>
              <div class="form-group">
                <label for="password" class="control-label">Contraseña</label>
                <input type="name" class="form-control" id="password" name="password" value="">
              </div>
              <div class="form-group">
                <label for="rol" class="control-label">Seleccione el rol</label><br>
                <select class="form-control"id="rol" name="rol">
                  <option value="Administrador" selected>Administrador</option>
                  <option value="Secretaria" >Secretaria</option>
                </select>
              </div>
              <div class="form-group clearfix">
                <button type="submit" id="btnAgregarAdministrador" name="btnAgregarAdministrador" class="btn btn-info">Registrar</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
        </div>
      </div>
     </div>
    </div>
  </body>
</html>
<?php
} else {
  header("Location: index.php");
}
?>
