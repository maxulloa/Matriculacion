<?php

  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link, "matriculacion");

  $codigoDocente = $_POST['codigoDocente'];
  $curso = $_POST['curso'];
  $duracion="0";



$cad = "INSERT INTO CURSO_DOCENTE VALUES ('0','$duracion','$curso','$codigoDocente')";
if ($ingreso = mysqli_query($link, $cad)) {
  ?>
  <script language="javascript">
      alert("Se a guardado exitosamente");
      window.location.href = '../../DocenteCurso.php'
  </script>;
  <?php

} else {
  echo $cad;
  ?>
  <script language="javascript">
      alert("No se a podido guardar");
      window.location.href = '../../DocenteCurso.php'
  </script>;
  <?php

}

?>
