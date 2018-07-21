<?php
  session_start();
  if(isset($_SESSION['id'])) {
    $rol = $_SESSION['rol'];
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $ncompleto = $nombre." ".$apellido;
  }
  if ($rol == "Administrador") {
    $idEst = $_GET['ide'];
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
      include("funciones/administrador/recuperaDatosEstudiante.php");
      $datos = datosEstudiante($idEst);
      $data = json_decode($datos,true);
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
              <span>Editar Estudiante</span>
            </div>
            <div class="panel-body">
              <form enctype="multipart/form-data" method="POST" action="funciones/administrador/actualizaDatosEstudiante.php" class="clearfix">
                <?php
                  echo "<input type='name' class='form-control' name='idEstudiante' id='idEstudiante' value='".$data[0]['est_id']."' style='display:none;' required>";
                  echo "<div class='form-group'>";
                  echo "<div>";
                  echo "<label id='cedulaMsj'></label>";
                  echo "</div>";
                  echo "<label for='cedula' class='control-label'>Cédula</label>";
                  echo "<input type='name' class='form-control' name='cedula' id='cedula' value='".$data[0]['est_cedula']."' placeholder='Cédula' onkeyup='validar()' onchange='validar()' required>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='nombre' class='control-label'>Nombre</label>";
                  echo "<input type='name' class='form-control' name='nombre' value='".$data[0]['est_nombre']."' placeholder='Nombre' required>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='apellido' class='control-label'>Apellido</label>";
                  echo "<input type='name' class='form-control' name='apellido' value='".$data[0]['est_apellido']."' placeholder='Apellido' required>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='correo' class='control-label'>Correo</label>";
                  echo "<input type='email' class='form-control' name='correo' value='".$data[0]['est_correo']."' placeholder='Correo' required>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='ciudad' class='control-label'>Ciudad</label>";
                  echo "<input type='text' class='form-control' name='ciudad' value='".$data[0]['est_ciudad']."' placeholder='Ciudad required>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='fecha_nacimiento' class='control-label'>Fecha de nacimiento</label>";
                  echo "<input type='date' class='form-control' name='fecha_nacimiento' value='".$data[0]['est_fecha_nacimiento']."'>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='edad' class='control-label'>Edad</label>";
                  echo "<input type='number' class='form-control' name='edad' value='".$data[0]['est_edad']."' min='0' required>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='genero' class='control-label'>Genero</label><br>";
                  echo "<center>";
                  if ($data[0]['est_genero'] == "Masculino"){
                    echo "<input type='radio' name='genero' value='Masculino' checked>Masculino<br>";
                    echo "<input type='radio'  name='genero' value='Femenino' >Femenino<br>";
                  } else {
                    echo "<input type='radio' name='genero' value='Masculino' >Masculino<br>";
                    echo "<input type='radio'  name='genero' value='Femenino' checked>Femenino<br>";
                  }
                  echo "</center>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='telefono' class='control-label'>Telefono</label>";
                  echo "<input type='number' class='form-control' name='telefono' value='".$data[0]['est_telefono']."' min='0' required>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='discapacidad' class='control-label'>Discapacidad</label><br>";
                  echo "<select class='form-control' name='discapacidad'>";
                  if ($data[0]['est_discapacidad'] == "Si"){
                    echo "<option value='Si' selected>Si</option>";
                    echo "<option value='No'>No</option>";
                  } else {
                    echo "<option value='Si'>Si</option>";
                    echo "<option value='No' selected>No</option>";
                  }
                  echo "</select>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='representante' class='control-label'>Representante</label>";
                  echo "<input type='text' class='form-control' name='representante' placeholder='Representante' value='".$data[0]['est_representante']."'>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='ocupacion' class='control-label'>Ocupación</label>";
                  echo "<input type='text' class='form-control' name='ocupacion' placeholder='Ocupación' value='".$data[0]['est_ocupacion']."'>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='lugarTrabajo' class='control-label'>Lupagr de trabajo</label>";
                  echo "<input type='text' class='form-control' name='lugarTrabajo' placeholder='Lugar de trabajo' value='".$data[0]['est_lugar_trabajo']."'>";
                  echo "</div>";
                  echo "<div class='form-group'>";
                  echo "<label for='observaciones' class='control-label'>Observaciones</label>";
                  echo "<textarea rows='4' cols='50' type='text' class='form-control' name='observaciones' placeholder='Observaciones' value=''>";
                  echo $data[0]['est_observaciones'];
                  echo "</textarea>";
                  echo "</div";
                  echo "<div class='form-group'>";
                  echo "<label for='clave' class='control-label'>Contrasena</label>";
                  echo "<input type='text' class='form-control' name='clave' value='".$data[0]['est_contrasena']."' min='0' checked>";
                ?>
                </div>
                <div class="form-group clearfix">
                  <center>
                    <button type="submit" name="save" id="save" class="btn btn-info" style='display:block;'>Editar</button>
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
