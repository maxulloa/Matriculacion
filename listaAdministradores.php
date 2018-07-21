<?php
  session_start();
  if(isset($_SESSION['id'])) {
    $rol = $_SESSION['rol'];
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $ncompleto = $nombre." ".$apellido;
  }
  if ($rol == "Administrador") {
?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Administrador</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />
  </head>
  <body>
    <?php
      include("includes/headerAdministrador.php");
      include("includes/menuAdministrador.php");
      include("funciones/administrador/listaAdministradores.php");
      $datos = listaAdministradores();
      $data = json_decode($datos,true);
    ?>
    <div class="page">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading clearfix">
                <strong>
                  <span class="glyphicon glyphicon-th"></span>
                  <span>Administradores y secretarias</span>
                </strong>
              </div>
              <div class="panel-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 10%;">Código</th>
                      <th class="text-center" style="width: 20%;">Cédula</th>
                      <th class="text-center" style="width: 20%;">Nombres</th>
                      <th class="text-center" style="width: 20%;">Correo</th>
                      <th class="text-center" style="width: 10%;">Rol</th>
                      <th class="text-center" style="width: 20%;">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                       for ($i = 0; $i < count($data); $i++){
                         echo "<tr>";
                         echo "<td class='text-center'>".$data[$i]['admin_id']."</td>";
                         echo "<td class='text-center'>".$data[$i]['admin_cedula']."</td>";
                         echo "<td>".$data[$i]['admin_nombre']." ".$data[$i]['admin_apellido']."</td>";
                         echo "<td class='text-center'>".$data[$i]['admin_correo']."</td>";
                         echo "<td class='text-center'>".$data[$i]['admin_rol']."</td>";
                         echo "<td class='text-center'>
                                 <div class='btn-group'>
                                   <a href='editarAdministrador.php?ida=".$data[$i]['admin_id']."' class='btn btn-xs btn-warning' data-toggle='tooltip' title='Editar'>
                                     <i class='glyphicon glyphicon-pencil'></i>
                                   </a>
                                   <a href='funciones/administrador/eliminarAdministrador.php?ida=".$data[$i]['admin_id']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Eliminar'>
                                     <i class='glyphicon glyphicon-remove'></i>
                                   </a>
                                 </div>
                               </td>";
                         echo "</tr>";
                       }
                     ?>

                  </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
       </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="libs/js/functions.js"></script>
  </body>
</html>
<?php
} else {
  header("Location: index.php");
}
?>
