<?php

  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link, "matriculacion");

  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $estado="A";



$cad = "INSERT INTO CURSO VALUES ('0','$descripcion','$precio','$estado')";
if ($ingreso = mysqli_query($link, $cad)) {
  ?>
  <script language="javascript">
      alert("Se a guardado exitosamente");
      window.location.href = '../../agregarCurso.php'
  </script>;
  <?php

} else {
  echo $cad;
  ?>
  <script language="javascript">
      alert("No se a podido guardar");
      window.location.href = '../../agregarCurso.php'
  </script>;
  <?php

}

?>
