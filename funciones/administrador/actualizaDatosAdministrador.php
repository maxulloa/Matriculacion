<?php
  session_start();
  include ("../conexiondb.php");
  $link = conectar();
  mysqli_select_db($link,"matriculacion");

  $cedula = mysqli_real_escape_string($link, $_POST["cedula"]);
  $nombre = mysqli_real_escape_string($link, $_POST["nombre"]);
  $apellido = mysqli_real_escape_string($link, $_POST["apellido"]);
  $correo = mysqli_real_escape_string($link, $_POST["correo"]);

  if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
  }

  $vced = validar($cedula);

  if ($vced != "Cedula Invalida"){
    $cad = "UPDATE `administrador` SET admin_cedula='".$cedula."',"."admin_nombre='".$nombre."',"."admin_apellido='".$apellido."',"."admin_correo='".$correo."' WHERE admin_id=".$id;
    if($ingreso = mysqli_query($link,$cad)) {
      echo "DatosActualizados";
    }else{
      echo "No se a podido actualizar los datos";
    }
  } else {
    echo "CedulaInvalida";
  }

  function validar($cedula)
  {
    $resultado = "";
	  $arrayced = str_split($cedula);
	  $sumaced = 0;

	  $tam = strlen($cedula);

	  if ($tam == 10){
      for ($i = 0; $i < 9; $i++){
        if ($i == 0){
          $dig1 = $arrayced[$i]*2;
          if ($dig1 > 9){
            $dig1 = $dig1-9;
					  $sumaced = $sumaced+$dig1;
          } else {
            $sumaced = $sumaced+$dig1;
          }
        } else {
          if ($i == 2){
            $dig2 = $arrayced[$i]*2;
            if ($dig2 > 9){
              $dig2 = $dig2-9;
              $sumaced = $sumaced+$dig2;
            } else {
              $sumaced = $sumaced+$dig2;
            }
          } else {
            if ($i == 4){
              $dig3 = $arrayced[$i]*2;
              if ($dig3 > 9){
                $dig3 = $dig3-9;
                $sumaced = $sumaced+$dig3;
              } else {
                $sumaced = $sumaced+$dig3;
              }
            } else {
              if ($i == 6){
                $dig4 = $arrayced[$i]*2;
                if ($dig4 > 9){
                  $dig4 = $dig4-9;
                  $sumaced = $sumaced+$dig4;
                } else {
                  $sumaced = $sumaced+$dig4;
                }
              } else {
                if ($i == 8){
                  $dig5 = $arrayced[$i]*2;
                  if ($dig5 > 9){
                    $dig5 = $dig5-9;
                    $sumaced = $sumaced+$dig5;
                  } else {
                    $sumaced = $sumaced+$dig5;
                  }
                } else {
                  $sumaced = $sumaced + $arrayced[$i];
                }
              }
            }
          }
        }
      }
      $residuo = $sumaced % 10;
      if ($residuo <> 0){
        $digitover = 10 - $residuo;
        if ($digitover == $arrayced[9]){
          $resultado = "";
        } else {
          $resultado = "Cedula Invalida";
				}
      } else {
        if ($residuo == $arrayced[9]){
          $resultado = "";
        } else {
          $resultado = "Cedula Invalida";
        }
      }
    } else {
      $resultado = "Cedula Invalida";
    }
	  return $resultado;
  }

?>
