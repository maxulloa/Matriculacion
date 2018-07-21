<?php
  session_start();
  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link,"matriculacion");

  $ide = mysqli_real_escape_string($link, $_GET['ide']);

  $cad = "UPDATE ESTUDIANTE SET est_estado='I' WHERE est_id=".$ide;
  if($ingreso = mysqli_query($link,$cad)) {
?>
    <script language="javascript">
      window.location.href = '../../listaEstudiantesAdmin.php'
    </script>;
<?php
  }else{
?>
    <script language="javascript">
      window.location.href = '../../listaEstudiantesAdmin.php'
    </script>;
<?php
  }
?>
