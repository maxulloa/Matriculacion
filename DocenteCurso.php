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
            include("funciones/administrador/listaDocentesAdmin.php");
            $datos = listaDocentesAdmin();
            $data = json_decode($datos,true);

            $datos1 = listaCursosAdmin();
            $data1 = json_decode($datos1);
        ?>

        <script>
          function hola(){
              var cedula = $("#cedula").val();
              var datos = <?php echo $datos; ?>;
              for (i = 0; i < datos.length; i++) {
                if (datos[i]['doc_cedula'] == cedula){
                    document.getElementById('nombreApellido').value = datos[i]['doc_nombre']+" "+datos[i]['doc_apellido'];
                    document.getElementById('codigoDocente').value = datos[i]['doc_id'];
                }
              }
          }
          function cargaDatos(){
              var codigoEst = $("#codigoDocente").val();
              var datos = <?php echo $datos; ?>;
              for (i = 0; i < datos.length; i++) {
                if (datos[i]['doc_id'] == codigoEst){
                    document.getElementById('nombreApellido').value = datos[i]['doc_nombre']+" "+datos[i]['doc_apellido'];
                    document.getElementById('cedula').value = datos[i]['doc_cedula'];
                }
              }
          }
        </script>

<div class="page">
  <div class="container-fluid">

<div class="row">
   <div class="col-md-6">
        </div>
</div>


                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <span class="glyphicon glyphicon-edit"></span>
                                <span>Asignar docente a curso</span>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="funciones/administrador/CrearDocenteCurso.php" class="clearfix">



                                    <div class="form-group">
                                      <label for="codigoEstudiante" class="control-label col-lg-2">Codigo:</label>
                                       <div class="col-lg-4">
                                      <select class="form-control" id="codigoDocente" name="codigoDocente" onchange="cargaDatos()">
                                        <option value="Codigo">Codigo</option>
                                        <?php
                                          for ($i = 0; $i < count($data); $i++){
                                              echo "<option value='".$data[$i][doc_id]."'>".$data[$i][doc_id]."</option>";
                                          }
                                        ?>
                                      </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="cedula" class="control-label col-lg-2">Cedula</label>
                                         <div class="col-lg-4">
                                        <select class="form-control" id="cedula" name="cedula" onchange="hola()">
                                          <option value="Cedula">Cédula</option>
                                          <?php
                                            for ($i = 0; $i < count($data); $i++){
                                                echo "<option value='".$data[$i][doc_cedula]."'>".$data[$i][doc_cedula]."</option>";
                                            }
                                          ?>
                                        </select>
                                    </div>

                                        <br>
                                        <br>
                                        <br>
                                    <div class="form-group">
                                        <label for="nombreApellido" class="control-label">Docente</label>
                                        <input type="name" class="form-control" id="nombreApellido" name="nombreApellido" placeholder="Nombres" value="">
                                        <br>



                                    <div class="form-group">
                                        <label for="discapacidad" class="control-label">Curso</label><br>
                                        <select class="form-control" name="curso" id="curso">
                                          <option value="Seleccione">seleccione curso</option>

                                          <?php
                                            foreach ($data1 as $curso){
                                                echo "<option value='".$curso->curso_id."'>".$curso->curso_descripcion."</option>";
                                            }
                                          ?>
                                        </select>
                                    </div>









                                    <div class="form-group clearfix">
                                         <center>

                                        <button type="submit" name="update" class="btn btn-info">Agregar</button>
                                        </center>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>

     </div>
    </div>







                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <span class="glyphicon glyphicon-edit"></span>
                                <span>Lista de cursos con docentes asignados</span>
                            </div>
                            <div class="panel-body">
                              <table class="table table-bordered" id="datos_tabla">
                                <thead>
                                  <tr>
                                    <th class="text-center" style="width: 20%;">id</th>
                                    <th class="text-center" style="width: 20%;">Día</th>
                                    <th class="text-center" style="width: 20%;">Hora</th>
                                    <th class="text-center" style="width: 20%;">Acciones</th>

                                  </tr>
                                </thead>
                                <tbody>

                                  <?php


                                  $someJSON1=listaCursosDocentesAdmin();
                                  $someObject1 = json_decode($someJSON1);

                                  if ($someObject1=="No hay cursos")
                                  {
                                    echo "<tr>";
                                    echo $someObject1;
                                    echo "</tr>";

                                  }
                                  else {


                                    foreach ($someObject1 as $cd) {

                                      echo "<tr>";

                                      echo "<td class='text-center'>";
                                      echo $cd->cdoc_id;
                                      echo "</td>";

                                      echo "<td class='text-center'>".$cd->curso_descripcion."</td>";


                                      echo "<td class='text-center'>".$cd->doc_nombre."</td>";

                                      echo "<td class='text-center'>
                                              <div class='btn-group'>

                                                <a href='funciones/administrador/eliminarHorario.php?idcd=".$cd->cdoc_id."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Eliminar'>
                                                  <i class='glyphicon glyphicon-remove'></i>
                                                </a>
                                              </div>
                                            </td>";
                                      echo "</tr>";
                                    }
                                  }

                                  ?>
                                  </tbody>
                   </table>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
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
