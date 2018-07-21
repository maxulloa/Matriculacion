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
    <script src="js/jquery-3.2.1.min.js"></script>


    <script>

      $(Document).ready(function() {




        //  var nFilas = $("#datos_tabla tr").length - 1;
        $("#datos_tabla tbody tr td a span").click(function(){
          operacion = $(this).text();

          if (operacion == 'Agregar Horario') {


            $("#mostrarmodal").modal("show");

            valor1 = $(this).parents("tr").find("td").eq(0).html();
            $("#idc").val(valor1);

          }else {
            if (operacion == 'Modificar') {


              $("#mostrarmodal1").modal("show");

              valor2 = $(this).parents("tr").find("td").eq(0).html();
              valor3 = $(this).parents("tr").find("td").eq(1).html();
              valor4 = $(this).parents("tr").find("td").eq(2).html();
              $("#idc2").val(valor2);
              $("#materia").val(valor3);
              $("#costo").val(valor4);




            }
          }
        });
      });


    </script>


  </head>
  <body>
    <?php
      include("includes/headerAdministrador.php");
      include("includes/menuAdministrador.php");
      include("funciones/administrador/listaCursosAdmin.php");

      $datos = listaCursosAdmin();
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
                  <span>Cursos</span>
                </strong>
              </div>


              <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h3>Agregar horario</h3>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="funciones/administrador/CrearHorario.php" id="formulario_ingreso">

                        <input required type="hidden" name="idc" id="idc" placeholder="nombre" class="form-control" />

                        <div class="form-group">
                            <label for="dia" class="control-label">Dia</label>
                            <select  class="form-control" name="dia" id="dia" >
                              <option value='Lunes'>Lunes</option>
                              <option value='Martes'>Martes</option>
                              <option value='Miercoles'>Miercoles</option>
                              <option value='Jueves'>Miligramos</option>
                              <option value='Viernes'>Viernes</option>
                              <option value='Sabado'>Sabado</option>
                              <option value='Domingo'>Domingo</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="hora" class="control-label">Hora</label>
                          </br>
                            <div class="control">
                                <label for="appt-time">Hora de inicio:</label>
                                <input type="time" id="horai" name="horai"
                                       min="7:00" max="21:00" required />
                                <label for="appt-time">Hora final:</label>
                                <input type="time" id="horaf" name="horaf"
                                        min="7:00" max="21:00" required />

                            </div>

                        </div>




                        <div class="modal-footer">

                          <button class="btn btn-info" id="boton_guardar"><span>Guardar</span></button>
                          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                        </div>


                      </form>


                    </div>

                  </div>
                </div>
              </div>



              <div class="modal fade" id="mostrarmodal1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" >

                <div class="modal-dialog">


                  <div class="modal-content">


                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h3>Modificar Curso</h3>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="funciones/administrador/actualizarCurso.php" id="formulario_ingreso2">


                        <input required type="hidden" name="idc2" id="idc2" placeholder="nombre" class="form-control" />

                        <div class="form-group">
                            <label for="dia" class="control-label">Materia</label>
                              <input required type="text" name="materia" id="materia" placeholder="materia" class="form-control" />


                        </div>


                        <div class="form-group">
                            <label for="hora" class="control-label">Costo</label>
                            <input required type="number" name="costo" id="costo" placeholder="costo" class="form-control" />



                        </div>




                        <div class="modal-footer">

                          <button class="btn btn-info" id="boton_guardar"><span>Guardar</span></button>
                          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
                        </div>


                      </form>


                    </div>

                  </div>
                </div>
              </div>

              <div class="panel-body">
                <table class="table table-bordered" id="datos_tabla">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 20%;">Código</th>
                      <th class="text-center" style="width: 20%;">Nombre</th>
                      <th class="text-center" style="width: 20%;">Precio</th>
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
                          echo "<td class='text-center'>".$data[$i]['curso_id']."</td>";

                          echo "<td class='text-center'>".$data[$i]['curso_descripcion']."</td>";


                          echo "<td class='text-center'>".$data[$i]['curso_precio']."</td>";

                          echo "<td class='text-center'>
                                  <div class='btn-group'>
                                    <a  class='btn btn-xs btn-warning' data-toggle='tooltip' title='Agregar'>
                                      <span>Agregar Horario</span>

                                    </a>

                                    <a  class='btn btn-xs btn-info' data-toggle='tooltip' title='Modificar'>
                                      <span>Modificar</span>

                                    </a>
                                    <a  href='listaHorariosAdmin.php?idc=".$data[$i]['curso_id']."' class='btn btn-xs btn-info' data-toggle='tooltip' title='Horarios'>
                                      <span>Ver Horarios</span>

                                    </a>

                                    <a href='funciones/administrador/eliminarCurso.php?idc=".$data[$i]['curso_id']."' class='btn btn-xs btn-danger' data-toggle='tooltip' title='Eliminar'>
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
