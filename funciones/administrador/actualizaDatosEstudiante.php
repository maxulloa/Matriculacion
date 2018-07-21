<?php
  session_start();
  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link,"matriculacion");

  $ide = mysqli_real_escape_string($link, $_POST['idEstudiante']);
  $cedula = mysqli_real_escape_string($link, $_POST['cedula']);
  $nombre = mysqli_real_escape_string($link, $_POST['nombre']);
  $apellido = mysqli_real_escape_string($link, $_POST['apellido']);
  $correo = mysqli_real_escape_string($link, $_POST['correo']);
  $ciudad = mysqli_real_escape_string($link, $_POST['ciudad']);
  $fecha_nacimiento = mysqli_real_escape_string($link, $_POST['fecha_nacimiento']);
  $edad = mysqli_real_escape_string($link, $_POST['edad']);
  $genero = mysqli_real_escape_string($link, $_POST['genero']);
  $telefono = mysqli_real_escape_string($link, $_POST['telefono']);
  $discapacidad = mysqli_real_escape_string($link, $_POST['discapacidad']);
  $clave = mysqli_real_escape_string($link, $_POST['clave']);
  $representante = mysqli_real_escape_string($link, $_POST['representante']);
  $ocupacion = mysqli_real_escape_string($link, $_POST['ocupacion']);
  $lugarTrabajo = mysqli_real_escape_string($link, $_POST['lugarTrabajo']);
  $observaciones = mysqli_real_escape_string($link, $_POST['observaciones']);

  $cad = "UPDATE ESTUDIANTE SET est_cedula='".$cedula."',"."est_nombre='".$nombre."',"."est_apellido='".$apellido."',"."est_correo='".$correo."',"."est_ciudad='".$ciudad."',"."est_fecha_nacimiento='".$fecha_nacimiento."',"."est_edad='".$edad."',"."est_genero='".$genero."',est_telefono='"
  .$telefono."',"."est_discapacidad='".$discapacidad."',"."est_contrasena='".$clave."',"."est_representante='".$representante."',"."est_ocupacion='".$ocupacion."',"."est_lugar_trabajo='".$lugarTrabajo."',"."est_observaciones='".$observaciones."' WHERE est_id=".$ide;
  if($ingreso = mysqli_query($link,$cad)) {
?>
    <script language="javascript">
      window.location.href = '../../editarEstudiante.php?ide='+<?php echo $ide; ?>
    </script>;
<?php
  }else{
?>
    <script language="javascript">
      alert("No se a podido actualizar los datos");
      window.location.href = '../../editarEstudiante.php?ide='+<?php echo $ide; ?>
    </script>;
<?php
  }
?>
