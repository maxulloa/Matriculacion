<?php

  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link, "matriculacion");

  $cedula = $_POST['cedula'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $ciudad = $_POST['ciudad'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $edad = $_POST['edad'];
  $genero = $_POST['genero'];
  $telefono = $_POST['telefono'];
  $discapacidad = $_POST['discapacidad'];
  $clave = $_POST['clave'];
  $representante = $_POST['representante'];
  $ocupacion = $_POST['ocupacion'];
  $lugarTrabajo = $_POST['lugarTrabajo'];
  $observaciones = $_POST['observaciones'];
  $destination = "";
  $destination2 = "";

  if ( isset( $_FILES ) && isset( $_FILES['imagen'] ) && !empty( $_FILES['imagen']['name'] && !empty($_FILES['imagen']['tmp_name']) ) ) {
    if ( ! is_uploaded_file( $_FILES['imagen']['tmp_name'] ) ) {
      echo "Error: El fichero encontrado no fue procesado por la subida correctamente";
      exit;
    }
    $source = $_FILES['imagen']['tmp_name'];
    $destination='C:/xampp/htdocs/Matriculacion/images/fotos/'.$cedula.$_FILES['imagen']['name'];
    $destination2 = 'images/fotos/'.$cedula.$_FILES['imagen']['name'];

    if ( is_file($destination) ) {
     echo "Error: Ya existe almacenado un fichero con ese nombre";
     @unlink(ini_get('upload_tmp_dir').$_FILES['imagen']['tmp_name']);
     exit;
    }

    if ( ! @move_uploaded_file($source, $destination ) ) {
      echo "Error: No se ha podido mover el fichero enviado a la carpeta de destino";
      @unlink(ini_get('upload_tmp_dir').$_FILES['imagen']['tmp_name']);
      exit;
    }
  }

  $cad = "INSERT INTO ESTUDIANTE VALUES ('0','$cedula','$nombre','$apellido','$correo','$ciudad','$fecha_nacimiento','$edad','$genero','$telefono','$discapacidad','$clave','$destination2','A','$representante','$ocupacion','$lugarTrabajo','$observaciones')";
  if ($ingreso = mysqli_query($link, $cad)) {
?>
    <script language="javascript">
      alert("Se a guardado exitosamente");
      window.location.href = '../../AgregarEstudiante.php'
    </script>;
<?php
  } else {
?>
    <script language="javascript">
      alert("No se a podido guardar");
      window.location.href='../../AgregarEstudiante.php'
    </script>;
<?php
  }
?>
