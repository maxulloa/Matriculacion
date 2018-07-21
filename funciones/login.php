<?php session_start();
	//Conexión con la base de datos
	include ("conexiondb.php");
	$link = conectar();
	mysqli_select_db($link,"matriculacion");

  //Recepción de las variables desde el formulario
	$correo = mysqli_real_escape_string($link, $_POST["correo"]);
	$password = mysqli_real_escape_string($link, $_POST["password"]);

  //Consulta en la base de datos para verificar si coincide el correo con la contraseña
  $estado="No";
  $sql = "SELECT * FROM administrador WHERE admin_correo='$correo' and admin_password='$password'";
  $result = mysqli_query($link,$sql);
	while ($f=mysqli_fetch_row($result)){
  	//Si existe una coincidencia se inicia sesión
    $_SESSION['id']=$f[0];
    $_SESSION['cedula']=$f[1];
    $_SESSION['nombre']=$f[2];
    $_SESSION['apellido']=$f[3];
    $_SESSION['rol']="Administrador";
    $estado="Si";
	}

    //Si existe una coincidencia se redirige a la página del administrador
    if ($estado == "Si"){
?>
    	<script language="javascript">
      	window.location.href='../adminPrincipal.php';
      </script>
<?php
      //Si no existe ninguna coincidencia muestra un mensaje
      } else {
?>
      	<script language="javascript">
        	alert("Correo o password incorrecto")
          window.location.href='../index.php';
        </script>
<?php
      }
?>
