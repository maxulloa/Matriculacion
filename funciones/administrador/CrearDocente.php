<?php
  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link, "matriculacion");
  $cedula = $_POST['cedula'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $especialidad=$_POST['especialidad'];
  $genero = $_POST['genero'];
  $ciudad = $_POST['ciudad'];
  $clave = $_POST['clave'];
  $destination="";
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
        //echo "Fichero subido correctamente a: ".$destination;
  }
//$destination='fotos';
$cad = "INSERT INTO DOCENTE VALUES ('0','$cedula','$nombre','$apellido','$correo','$telefono','$especialidad','$genero','$ciudad','$clave','A','$destination2')";
if ($ingreso = mysqli_query($link, $cad)) {
  ?>
  <script language="javascript">
      alert("Se a guardado exitosamentes");
      window.location.href = '../../agregarDocente.php'
  </script>;
  <?php
} else {
  echo $cad;
  ?>
  <script language="javascript">
      alert("No se a podido guardar");
      //window.location.href='../../ConsentimientoRepresentante.php'
  </script>;
  <?php
}
?>
