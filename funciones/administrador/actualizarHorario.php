<?php
  session_start();
  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link,"matriculacion");



  $idc= $_REQUEST["idc"];
  $idh= $_REQUEST["idh"];

  $dia = mysqli_real_escape_string($link, $_POST["dia"]);
  $horai = mysqli_real_escape_string($link, $_POST["horai"]);
  $horaf = mysqli_real_escape_string($link, $_POST["horaf"]);
  $hora = $horai."-".$horaf;





  $cad = "UPDATE `horario` SET hor_dia='".$dia."',"."hor_hora='".$hora."' WHERE hor_id=".$idh;
  if($ingreso = mysqli_query($link,$cad)) {
    echo "DatosActualizados";


    ?>
    <script language="javascript">
  		window.location.href='../../listaHorariosAdmin.php?idc='+<?php echo $idc; ?>;
    </script>;
    <?php


  }else{
    echo "No se a podido actualizar los datos";
    ?>

    <script language="javascript">
      window.location.href='../../listaHorariosAdmin.php?idc='+<?php echo $idc; ?>;
    </script>;
    <?php

  }








?>
