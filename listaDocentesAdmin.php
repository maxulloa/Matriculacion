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
    <title>Lista de docentes    </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />
  </head>
  <body>
    <?php
      include("includes/headerAdministrador.php");
      include("includes/menuAdministrador.php");
      include("funciones/administrador/listaDocentesAdmin.php");
      $datos = listaDocentesAdmin();
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
                  <span>Estudiantes</span>
                </strong>
              </div>
              <div class="panel-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 20%;">Cédula</th>
                      <th>Nombres</th>
                      <th class="text-center" style="width: 20%;">Foto</th>

                      <th class="text-center" style="width: 20%;">Correo</th>
                      <th class="text-center" style="width: 20%;">Telefono</th>
                      <th class="text-center" style="width: 10%;">Especialidad</th>
                      <th class="text-center" style="width: 15%;">Género</th>
                      <th class="text-center" style="width: 20%;">Ciudad</th>
                      <th class="text-center" style="width: 20%;">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>

                      <?php

                      if ($data=="No hay horarios")
                      {
                        echo "<tr>";
                        echo $data;
                        echo "</tr>";


                      }
                      else {
                        for ($i = 0; $i < count($data); $i++){
                          echo "<tr>";
                          echo "<td class='text-center'>".$data[$i]['doc_cedula']."</td>";

                          echo "<td>".$data[$i]['doc_nombre']." ".$data[$i]['doc_apellido']."</td>";
                          echo "<td class='text-center'><img src='".$data[$i]['doc_foto']."' border='0' width='100' height='100'></td>";

                          echo "<td class='text-center'>".$data[$i]['doc_correo']."</td>";
                          echo "<td class='text-center'>".$data[$i]['doc_telefono']."</td>";
                          echo "<td class='text-center'>".$data[$i]['doc_especialidad']."</td>";
                          echo "<td class='text-center'>".$data[$i]['doc_genero']."</td>";
                          echo "<td class='text-center'>".$data[$i]['doc_ciudad']."</td>";
                          echo "<td class='text-center'>
                                  <div class='btn-group'>
                                    <a href='editarDocente.php?idd=".$data[$i]['doc_id']."' class='btn btn-xs btn-warning' data-toggle='tooltip' title='Editar'>
                                      <i class='glyphicon glyphicon-pencil'></i>
                                    </a>
                                    <a href='funciones/administrador/eliminarDocente.php?idd=".$data[$i]['doc_id']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Eliminar'>
                                      <i class='glyphicon glyphicon-remove'></i>
                                    </a>
                                  </div>
                                </td>";
                          echo "</tr>";
                        }
                      }


                      /*
                        foreach ($data as $datos) {
                          echo "<tr>";
                          echo "<td class='text-center'>".$datos->doc_cedula."</td>";
                          echo "<td>".$datos->doc_nombre." ".$datos->doc_apellido."</td>";
                          echo "<td class='text-center'>".$datos->doc_correo."</td>";
                          echo "<td class='text-center'>".$datos->doc_telefono."</td>";
                          echo "<td class='text-center'>".$datos->doc_especilidad."</td>";
                          echo "<td class='text-center'>".$datos->doc_genero."</td>";
                          echo "<td class='text-center'>".$datos->doc_ciudad."</td>";
                          echo "<td class='text-center'>
                                  <div class='btn-group'>
                                    <a href='editarEstudiante.php?ide=".$datos->doc_id."' class='btn btn-xs btn-warning' data-toggle='tooltip' title='Editar'>
                                      <i class='glyphicon glyphicon-pencil'></i>
                                    </a>
                                    <a href='delete_group.php?ide=1' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Eliminar'>
                                      <i class='glyphicon glyphicon-remove'></i>
                                    </a>
                                  </div>
                                </td>";
                          echo "</tr>";
                        }

                        */
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
