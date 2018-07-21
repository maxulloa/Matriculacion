<?php
session_start();
include ("../conexiondb.php");
$link = conectar();
mysqli_select_db($link,"matriculacion");



$idcd= $_REQUEST["idcd"];



$cad = "DELETE FROM CURSO_DOCENTE WHERE cdoc_id='".$idcd."'";

if($ingreso = mysqli_query($link,$cad)) {
	?>
	<script language="javascript">
		window.location.href='../../DocenteCurso.php';
	</script>;
	<?php

}else{
	?>
	<script language="javascript">
		alert("No se ha eliminado correctamente");
		window.location.href='../..DocenteCurso.php';
	</script>;
	<?php
}



?>
