<?php
  function datosEstudiante($idE)
  {
    $outp = "";
    include ("funciones/conexiondb.php");
    $link = conectar();
    mysqli_select_db($link,"matriculacion");
    $sql = "SELECT * FROM `estudiante` WHERE `est_id`=$idE";
    $result = $link->query($sql);
    if ($result->num_rows == 0)
    {
      $outp = "No hay datos";
    } else
    {
      $outp = array();
      $outp = $result->fetch_all(MYSQLI_ASSOC);
    }
      $json_response = json_encode($outp);
      return $json_response;
  }
?>
