<?php
  session_start();
  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link,"matriculacion");

  $ida = mysqli_real_escape_string($link, $_GET['ida']);

  $cad = "UPDATE ADMINISTRADOR SET admin_estado='I' WHERE admin_id=".$ida;
  if($ingreso = mysqli_query($link,$cad)) {
?>
    <script language="javascript">
      window.location.href = '../../listaAdministradores.php'
    </script>;
<?php
  }else{
?>
    <script language="javascript">
      window.location.href = '../../listaAdministradores.php'
    </script>;
<?php
  }
?>
