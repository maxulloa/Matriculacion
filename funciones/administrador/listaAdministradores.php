<?php
  function listaAdministradores()
  {
    $outp = "";
    include ("funciones/conexiondb.php");
    $link = conectar();
    mysqli_select_db($link,"matriculacion");
    $sql = "SELECT * FROM `administrador` WHERE `admin_estado`='A'";
    $result = $link->query($sql);
    if ($result->num_rows == 0)
    {
      $outp = "No hay administradores";
    } else
    {
      $outp = array();
      $outp = $result->fetch_all(MYSQLI_ASSOC);
    }
      $json_response = json_encode($outp);
      return $json_response;
  }
?>
