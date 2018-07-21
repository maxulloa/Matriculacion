<?php
session_start();
include ("../conexiondb.php");
$link = conectar();
mysqli_select_db($link,"matriculacion");



$idc= $_REQUEST["idc"];



$cad = "UPDATE `curso` SET curso_estado='I' WHERE curso_id=".$idc;
if($ingreso = mysqli_query($link,$cad)) {
	echo "DatosActualizados";
	?>
	<script language="javascript">
		window.location.href='../../listaCursosAdmin.php';
	</script>;
	<?php

}else{
	echo "No se a podido actualizar los datos";
	?>
	<script language="javascript">
		alert("No se ha eliminado correctamente");
		window.location.href='../../listaCursosAdmin.php';
	</script>;
	<?php
}



?>
