<?php
session_start();
include ("../conexiondb.php");
$link = conectar();
mysqli_select_db($link,"matriculacion");



$idd= $_REQUEST["idd"];



$cad = "UPDATE `docente` SET doc_estado='I' WHERE doc_id=".$idd;
if($ingreso = mysqli_query($link,$cad)) {
	echo "DatosActualizados";
	?>
	<script language="javascript">
		window.location.href='../../listaDocentesAdmin.php';
	</script>;
	<?php

}else{
	echo "No se a podido actualizar los datos";
	?>
	<script language="javascript">
		alert("No se ha eliminado correctamente");
		window.location.href='../../listaDocentesAdmin.php';
	</script>;
	<?php
}



?>
