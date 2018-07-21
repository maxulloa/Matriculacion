<?php
  session_start();
  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link,"matriculacion");



  $idc= $_REQUEST["idc2"];
  $materia= $_REQUEST["materia"];
  $costo= $_REQUEST["costo"];








  $cad = "UPDATE `curso` SET curso_descripcion='".$materia."',"."curso_precio='".$costo."' WHERE curso_id=".$idc;
  if($ingreso = mysqli_query($link,$cad)) {
    echo "DatosActualizados";


    ?>
    <script language="javascript">
  		window.location.href='../../listaCursosAdmin.php'
    </script>;
    <?php


  }else{
    echo "No se a podido actualizar los datos";
    ?>

    <script language="javascript">
      window.location.href='../../listaCursosAdmin.php'
    </script>;
    <?php

  }








?>
