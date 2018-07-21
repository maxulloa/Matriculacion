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
            include("funciones/administrador/listaAlumnosAdmin.php");
            include("funciones/administrador/listaMateriaMatricula.php");
            include("funciones/administrador/listaHorarioMatricula.php");
            $materias = listaMaterias();
            $materia = json_decode($materias,true);
            $datos = listaEstudiantesAdmin();
            $data = json_decode($datos,true);
            $horarios = listaHorarios();
            $horario = json_decode($horarios,true);
        ?>

        <script>
          function hola(){
              var cedula = $("#cedula").val();
              var datos = <?php echo $datos; ?>;
              for (i = 0; i < datos.length; i++) {
                if (datos[i]['est_cedula'] == cedula){
                    document.getElementById('nombreApellido').value = datos[i]['est_nombre']+" "+datos[i]['est_apellido'];
                    document.getElementById('codigoEstudiante').value = datos[i]['est_id'];
                }
              }
          }
          function cargaDatos(){
              var codigoEst = $("#codigoEstudiante").val();
              var datos = <?php echo $datos; ?>;
              for (i = 0; i < datos.length; i++) {
                if (datos[i]['est_id'] == codigoEst){
                    document.getElementById('nombreApellido').value = datos[i]['est_nombre']+" "+datos[i]['est_apellido'];
                    document.getElementById('cedula').value = datos[i]['est_cedula'];
                }
              }
          }
          function cargaCurso(){
              for (i = 1; i <= $("#Lunes").length; i++){
                document.getElementById("Lunes").remove(i);
              }
              for (i = 1; i <= $("#Martes").length; i++){
                document.getElementById("Martes").remove(i);
              }
              for (i = 1; i <= $("#Miercoles").length; i++){
                document.getElementById("Miercoles").remove(i);
              }
              for (i = 1; i <= $("#Jueves").length; i++){
                document.getElementById("Jueves").remove(i);
              }
              for (i = 1; i <= $("#Viernes").length; i++){
                document.getElementById("Viernes").remove(i);
              }
              for (i = 1; i <= $("#Sabado").length; i++){
                document.getElementById("Sabado").remove(i);
              }
              for (i = 1; i <= $("#Domingo").length; i++){
                document.getElementById("Domingo").remove(i);
              }
              var codigoCur = $("#curso").val();
              var datos = <?php echo $materias; ?>;
              var horarios = <?php echo $horarios; ?>;
              for (i = 0; i < datos.length; i++) {
                if (datos[i]['curso_id'] == codigoCur){
                    document.getElementById('codigoCurso').value = datos[i]['curso_id'];
                    document.getElementById('precio').value = datos[i]['curso_precio'];
                    for (j = 0; j < horarios.length; j++){
                      if (datos[i]['curso_id'] == horarios[j]['hor_curso_id']){
                        $("#"+horarios[j]['hor_dia']).append('<option value='+horarios[j]['hor_hora']+'>'+horarios[j]['hor_hora']+'</option>');
                      }
                    }
                }
              }
          }
          function calculaSaldo(){
              var precio = $("#precio").val();
              var abono = $("#abono").val();
              document.getElementById('saldo').value = precio - abono;
          }
          function calculaDescuento(){
              var precio = $("#precio").val();
              var descuento = $("#descuento").val();
              var desc = (descuento / 100) * precio;
              document.getElementById('total').value = precio - desc;
          }
          function fPago(){
            var fPago = $("#formaPago").val();
            if (fPago == "contado"){
              document.getElementById('abono').style.display = 'none';
              document.getElementById('saldo').style.display = 'none';
              document.getElementById('labono').style.display = 'none';
              document.getElementById('lsaldo').style.display = 'none';
              document.getElementById('descuento').style.display = 'block';
              document.getElementById('total').style.display = 'block';
              document.getElementById('ldescuento').style.display = 'block';
              document.getElementById('ltotal').style.display = 'block';
            } else {
              document.getElementById('abono').style.display = 'block';
              document.getElementById('saldo').style.display = 'block';
              document.getElementById('labono').style.display = 'block';
              document.getElementById('lsaldo').style.display = 'block';
              document.getElementById('descuento').style.display = 'none';
              document.getElementById('total').style.display = 'none';
              document.getElementById('ldescuento').style.display = 'none';
              document.getElementById('ltotal').style.display = 'none';
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
                                <span>Seleccionar Estudiante y curso</span>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="funciones/administrador/CrearUsuarios.php" class="clearfix">



                                    <div class="form-group">
                                      <label for="codigoEstudiante" class="control-label col-lg-2">Codigo:</label>
                                       <div class="col-lg-4">
                                      <select class="form-control" id="codigoEstudiante" name="codigoEstudiante" onchange="cargaDatos()">
                                        <option value="Codigo">Codigo</option>
                                        <?php
                                          for ($i = 0; $i < count($data); $i++){
                                              echo "<option value='".$data[$i][est_id]."'>".$data[$i][est_id]."</option>";
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
                                                echo "<option value='".$data[$i][est_cedula]."'>".$data[$i][est_cedula]."</option>";
                                            }
                                          ?>
                                        </select>
                                    </div>
                                        <br>
                                        <br>
                                        <br>
                                    <div class="form-group">
                                        <label for="nombreApellido" class="control-label">Estudiante</label>
                                        <input type="name" class="form-control" id="nombreApellido" name="nombreApellido" placeholder="Nombres" value="">
                                        <br>


                                    <div class="form-group">
                                        <label for="curso" class="control-label">Curso</label><br>
                                        <select class="form-control" id="curso" name="curso" onchange="cargaCurso()">
                                          <option value="curso">Seleccione el curso</option>
                                          <?php
                                            for ($i = 0; $i < count($materia); $i++){
                                                echo "<option value='".$materia[$i][curso_id]."'>".$materia[$i][curso_descripcion]."</option>";
                                            }
                                          ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                      <label for="codigoCurso" class="control-label">Codigo</label>
                                      <input type="name" class="form-control" id="codigoCurso" name="codigoCurso" value="" readonly="readonly">
                                    </div>

                                    <div class="form-group">
                                      <label for="precio" class="control-label">Precio</label>
                                      <input type="name" class="form-control" id="precio" name="precio" value="">
                                  </div>

                                              <div class="form-group">
                                        <label for="fecha_inicio" class="control-label">Fecha de inicio</label>
                                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="">
                                    </div>


                                      <div class="form-group">
                                        <label for="duracion" class="control-label">Duracion</label>
                                        <input type="number" class="form-control" id="duracion" name="duracion" value="">
                                    </div>

                                      <div class="form-group">
                                        <label for="unidad" class="control-label">Unidad</label>
                                        <input type="numer" class="form-control" id="unidad" name="unidad" value="">
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
                                <span>Seleccionar forma de pago y horarios</span>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="funciones/administrador/CrearUsuarios.php" class="clearfix">

                                  <div class="form-group">
                                    <label for="formaPago" class="control-label col-lg-2">Forma de pago:</label>
                                     <div class="col-lg-4">
                                    <select class="form-control" id="formaPago" name="formaPago" onchange="fPago()">
                                      <option value="contado">Contado</option>
                                      <option value="credito">Crédito</option>
                                    </select>
                                  </div>
                                </div>
                                <br/><br/>
                                    <div class="form-group">
                                        <label for="abono" id="labono" class="control-label col-lg-2" style='display:none;'>Abono:</label>
                                        <div class="col-lg-4">
                                        <input class="form-control" id="abono" name="abono" onchange="calculaSaldo()" style='display:none;'/>
                                    </div>

                                    <div class="form-group">
                                        <label for="saldo" id="lsaldo" class="control-label col-lg-2" style='display:none;'>Saldo:</label>
                                        <div class="col-lg-4">
                                        <input class="form-control" id="saldo" name="saldo" readonly="readonly" style='display:none;'/>
                                    </div>
<br/>
                                        <div class="form-group">
                                            <label for="descuento" id="ldescuento" class="control-label col-lg-2" style='display:block;'>Descuento:</label>
                                            <div class="col-lg-4">
                                            <input class="form-control" id="descuento" name="descuento" onchange="calculaDescuento()" style='display:block;'/>
                                        </div>

                                        <div class="form-group">
                                            <label for="total" id="ltotal" class="control-label col-lg-2" style='display:block;'>Total:</label>
                                            <div class="col-lg-4">
                                            <input class="form-control" id="total" name="total" readonly="readonly" style='display:block;'/>
                                        </div>

                                    <br/><br/>
                                    <h2>Horario</h2>
                                    <br/>
                                    <div class="form-group">
                                      <label for="Lunes" class="control-label col-lg-2">Lunes:</label>
                                       <div class="col-lg-4">
                                      <select class="form-control" id="Lunes" name="Lunes">
                                        <option value="horaLunes">Hora</option>
                                      </select>
                                    </div>
                                  </div>
                                  <br/><br/>
                                  <div class="form-group">
                                    <label for="Martes" class="control-label col-lg-2">Martes:</label>
                                     <div class="col-lg-4">
                                    <select class="form-control" id="Martes" name="Martes">
                                      <option value="horaMartes">Hora</option>
                                    </select>
                                  </div>
                                </div>
                                <br/><br/>
                                <div class="form-group">
                                  <label for="Miercoles" class="control-label col-lg-2">Miercoles:</label>
                                   <div class="col-lg-4">
                                  <select class="form-control" id="Miercoles" name="Miercoles">
                                    <option value="horaMiercoles">Hora</option>
                                  </select>
                                </div>
                              </div>
                              <br/><br/>
                              <div class="form-group">
                                <label for="Jueves" class="control-label col-lg-2">Jueves:</label>
                                 <div class="col-lg-4">
                                <select class="form-control" id="Jueves" name="Jueves">
                                  <option value="horaJueves">Hora</option>
                                </select>
                              </div>
                            </div>
                            <br/><br/>
                            <div class="form-group">
                              <label for="Viernes" class="control-label col-lg-2">Viernes:</label>
                               <div class="col-lg-4">
                              <select class="form-control" id="Viernes" name="Viernes">
                                <option value="horaViernes">Hora</option>
                              </select>
                            </div>
                          </div>
                          <br/><br/>
                          <div class="form-group">
                            <label for="Sabado" class="control-label col-lg-2">Sábado:</label>
                             <div class="col-lg-4">
                            <select class="form-control" id="Sabado" name="Sabado">
                              <option value="horaSabado">Hora</option>
                            </select>
                          </div>
                        </div>
                        <br/><br/>
                        <div class="form-group">
                          <label for="Domingo" class="control-label col-lg-2">Domingo:</label>
                           <div class="col-lg-4">
                          <select class="form-control" id="Domingo" name="Domingo">
                            <option value="horaDomingo">Hora</option>
                          </select>
                        </div>
                      </div>
                      <br/><br/>





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
