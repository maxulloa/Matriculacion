<?php

  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link, "matriculacion");

  $dia = $_POST['dia'];
  $horai = $_POST['horai'];
  $horaf = $_POST['horaf'];
  $idc = $_POST['idc'];
  $hora = $horai."-".$horaf;


$cad = "INSERT INTO HORARIO VALUES ('0','$dia','$hora','$idc')";
if ($ingreso = mysqli_query($link, $cad)) {
  ?>
  <script language="javascript">
      alert("Se a guardado exitosamente");
      window.location.href = '../../listaCursosAdmin.php'
  </script>;
  <?php

} else {
  echo $cad;
  ?>
  <script language="javascript">
      alert("No se a podido guardar");
      window.location.href = '../../listaCursosAdmin.php'
  </script>;
  <?php

}

?>
