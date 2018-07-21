<?php


  function listaHorariosAdmin($idc)
  {
    $outp = "";
    include ("funciones/conexiondb.php");
    $link = conectar();
    mysqli_select_db($link,"matriculacion");
    $sql = "SELECT * FROM  `horario` where `hor_curso_id`='$idc'";
    $result = $link->query($sql);
    if ($result->num_rows == 0)
    {
      $outp = "No hay horarios";
    } else
    {
      $outp = array();
      $outp = $result->fetch_all(MYSQLI_ASSOC);
    }
      $json_response = json_encode($outp);
      return $json_response;
  }
?>
