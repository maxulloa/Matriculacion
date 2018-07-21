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

    <script type="text/javascript">
      function control(f){
        var ext=['gif','jpg','jpeg','png'];
        var v=f.value.split('.').pop().toLowerCase();
        for(var i=0,n;n=ext[i];i++){
          if(n.toLowerCase()==v)
            return
        }
        var t=f.cloneNode(true);
        t.value='';
        f.parentNode.replaceChild(t,f);
        alert('Extensión no válida');
      }
    </script>

    <script type="text/javascript">
      function validar() {
        var cad = document.getElementById("cedula").value.trim();
        var total = 0;
        var longitud = cad.length;
        var longcheck = longitud - 1;

        if (longitud != 10){
          document.getElementById("cedulaMsj").innerHTML = ("Cedula Inválida");
          document.getElementById('save').style.display = 'none';
        } else {
          if (cad !== "" && longitud === 10){
            for(i = 0; i < longcheck; i++){
              if (i%2 === 0) {
                var aux = cad.charAt(i) * 2;
                if (aux > 9) aux -= 9;
                total += aux;
              } else {
                total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
              }
            }

            total = total % 10 ? 10 - total % 10 : 0;

            if (cad.charAt(longitud-1) == total) {
              document.getElementById("cedulaMsj").innerHTML = ("Cedula Válida");
              document.getElementById('save').style.display = 'block';
            }else{
              document.getElementById("cedulaMsj").innerHTML = ("Cedula Inválida");
              document.getElementById('save').style.display = 'none';
            }
          }

        }
      }
    </script>


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
              <span>Agregar Estudiante</span>
            </div>
            <div class="panel-body">
              <form enctype="multipart/form-data" method="POST" action="funciones/administrador/CrearUsuarios.php" class="clearfix">
                <div class="form-group">
                  <div>
                    <label id="cedulaMsj"></label>
                  </div>
                  <label for="cedula" class="control-label">Cédula</label>
                  <input type="name" class="form-control" name="cedula" id="cedula" value="" placeholder="Cédula" >
                </div>
                <div class="form-group">
                  <label for="nombre" class="control-label">Nombre</label>
                  <input type="name" class="form-control" name="nombre" value="" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                  <label for="apellido" class="control-label">Apellido</label>
                  <input type="name" class="form-control" name="apellido" value="" placeholder="Apellido" required>
                </div>
                <div class="form-group">
                  <label for="correo" class="control-label">Correo</label>
                  <input type="email" class="form-control" name="correo" value="" placeholder="Correo" required>
                </div>
                <div class="form-group">
                  <label for="ciudad" class="control-label">Ciudad</label>
                  <input type="text" class="form-control" name="ciudad" value="" placeholder="Ciudad" required>
                </div>
                <div class="form-group">
                  <label for="fecha_nacimiento" class="control-label">Fecha de nacimiento</label>
                  <input type="date" class="form-control" name="fecha_nacimiento" value="">
                </div>
                <div class="form-group">
                  <label for="edad" class="control-label">Edad</label>
                  <input type="number" class="form-control" name="edad" value="" min="0" required>
                </div>
                <div class="form-group">
                  <label for="genero" class="control-label">Genero</label><br>
                  <center>
                    <input type="radio" name="genero" value="Masculino" checked>Masculino<br>
                    <input type="radio"  name="genero" value="Femenino" >Femenino<br>
                  </center>
                </div>
                <div class="form-group">
                  <label for="telefono" class="control-label">Telefono</label>
                  <input type="number" class="form-control" name="telefono" value="" min="0" checked>
                </div>
                <div class="form-group">
                  <label for="discapacidad" class="control-label">Discapacidad</label><br>
                  <select class="form-control" name="discapacidad">
                    <option value="Si">Si</option>
                    <option value="No" selected>No</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="imagen" class="control-label">Foto</label><br>
                  <center>
                    <input type="file" class = "boton" id = "imagen" name="imagen" onchange="control(this)"/>
                  </center>
                </div>
                <div class="form-group">
                  <label for="representante" class="control-label">Representante</label>
                  <input type="text" class="form-control" name="representante" placeholder="Representante" value="">
                </div>
                <div class="form-group">
                  <label for="ocupacion" class="control-label">Ocupación</label>
                  <input type="text" class="form-control" name="ocupacion" placeholder="Ocupación" value="">
                </div>
                <div class="form-group">
                  <label for="lugarTrabajo" class="control-label">Lupagr de trabajo</label>
                  <input type="text" class="form-control" name="lugarTrabajo" placeholder="Lugar de trabajo" value="">
                </div>
                <div class="form-group">
                  <label for="observaciones" class="control-label">Observaciones</label>
                  <textarea rows="4" cols="50" type="text" class="form-control" name="observaciones" placeholder="Observaciones" value="">
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="clave" class="control-label">Contraseña</label>
                  <input type="text" class="form-control" name="clave" value="" min="0" checked>
                </div>
                <div class="form-group clearfix">
                  <center>
                    <button type="submit" name="save" id="save" class="btn btn-info" >Agregar</button>
                  </center>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
        </div>
      </div>
     </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="libs/js/functions.js"></script>
  </body>
</html>
<?php
} else {
  header("Location: index.php");
}
?>
