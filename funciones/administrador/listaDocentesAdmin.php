<?php
  function listaDocentesAdmin()
  {
    $outp = "";
    include ("funciones/conexiondb.php");
    $link = conectar();
    mysqli_select_db($link,"matriculacion");
    $sql = "SELECT * FROM `docente` WHERE `doc_estado`='A'";
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


  function listaCursosAdmin()
  {
    $outp = "";
    //include ("funciones/conexiondb.php");
    $link = conectar();
    mysqli_select_db($link,"matriculacion");
    $sql = "SELECT * FROM `curso` WHERE curso_estado='A'";
    $result = $link->query($sql);
    if ($result->num_rows == 0)
    {
      $outp = "No hay cursos";
    } else
    {
      $outp = array();
      $outp = $result->fetch_all(MYSQLI_ASSOC);
    }
      $json_response = json_encode($outp);
      return $json_response;
  }


  function listaCursosDocentesAdmin()
  {
    $outp = "";
    //include ("funciones/conexiondb.php");
    $link = conectar();
    mysqli_select_db($link,"matriculacion");
    $sql = "SELECT curso_docente.cdoc_id,curso.curso_descripcion,docente.doc_nombre,docente.doc_apellido FROM CURSO, DOCENTE,CURSO_DOCENTE WHERE curso.curso_id=curso_docente.cdoc_curso_id and docente.doc_id=curso_docente.cdoc_doc_id";
    $result = $link->query($sql);
    if ($result->num_rows == 0)
    {
      $outp = "No hay cursos";
    } else
    {
      $outp = array();
      $outp = $result->fetch_all(MYSQLI_ASSOC);
    }
      $json_response = json_encode($outp);
      return $json_response;
  }
?>
