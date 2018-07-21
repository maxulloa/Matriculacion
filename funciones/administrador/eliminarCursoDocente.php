<?php
session_start();
include ("../conexiondb.php");
$link = conectar();
mysqli_select_db($link,"matriculacion");



$idh= $_REQUEST["idh"];
$idc= $_REQUEST["idc"];


$cad = "DELETE FROM HORARIO WHERE hor_id='".$idh."'";

if($ingreso = mysqli_query($link,$cad)) {
	?>
	<script language="javascript">
		window.location.href='../../listaHorariosAdmin.php?idc='+<?php echo $idc; ?>;
	</script>;
	<?php

}else{
	?>
	<script language="javascript">
		alert("No se ha eliminado correctamente");
		window.location.href='../../listaHorariosAdmin.php?idc='+<?php echo $idc; ?>;
	</script>;
	<?php
}



?>
