<?php
  session_start();
  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link,"matriculacion");



  $idd= $_REQUEST["idd"];
  $cedula = mysqli_real_escape_string($link, $_POST["cedula"]);
  $nombre = mysqli_real_escape_string($link, $_POST["nombre"]);
  $apellido = mysqli_real_escape_string($link, $_POST["apellido"]);
  $correo = mysqli_real_escape_string($link, $_POST["correo"]);
  $telefono= mysqli_real_escape_string($link, $_POST["telefono"]);
  $especilidad= mysqli_real_escape_string($link, $_POST["especialidad"]);
  $genero= mysqli_real_escape_string($link, $_POST["genero"]);
  $ciudad= mysqli_real_escape_string($link, $_POST["ciudad"]);
  $clave= mysqli_real_escape_string($link, $_POST["clave"]);


  $cad = "UPDATE `docente` SET doc_cedula='".$cedula."',"."doc_nombre='".$nombre."',"."doc_apellido='".$apellido."',"."doc_correo='".$correo.
  "',"."doc_telefono='".$telefono."',"."doc_especialidad='".$especilidad."',"."doc_genero='".$genero."',"."doc_ciudad='".$ciudad."',"."doc_contrasena='".$clave."' WHERE doc_id=".$idd;
  if($ingreso = mysqli_query($link,$cad)) {
    echo "DatosActualizados";


    ?>
    <script language="javascript">
  		window.location.href='../../editarDocente.php?idd='+<?php echo $idd; ?>;;
    </script>;
    <?php


  }else{
    echo "No se a podido actualizar los datos";
    ?>

    <script language="javascript">
      window.location.href='../../editarDocente.php?idd='+<?php echo $idd; ?>;
    </script>;
    <?php

  }








?>
