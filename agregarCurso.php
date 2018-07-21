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

    <script type="text/javascript">
      function control(f){
        var ext=['gif','jpg','jpeg','png'];
        var v=f.value.split('.').pop().toLowerCase();
        for(var i=0,n;n=ext[i];i++){
          if(n.toLowerCase()==v)
            return
        }
        var t=f.cloneNode(true);
        t.value='';
        f.parentNode.replaceChild(t,f);
        alert('Extensión no válida');
      }
    </script>

    <script type="text/javascript">
  function validar() {
    var cad = document.getElementById("cedula").value.trim();
    var total = 0;
    var longitud = cad.length;
    var longcheck = longitud - 1;
    if (longitud != 10){
      document.getElementById("cedulaMsj").innerHTML = ("Cedula Inválida");
      document.getElementById('save').style.display = 'none';
    } else {
      if (cad !== "" && longitud === 10){
        for(i = 0; i < longcheck; i++){
          if (i%2 === 0) {
            var aux = cad.charAt(i) * 2;
            if (aux > 9) aux -= 9;
            total += aux;
          } else {
            total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
          }
        }
        total = total % 10 ? 10 - total % 10 : 0;
        if (cad.charAt(longitud-1) == total) {
          document.getElementById("cedulaMsj").innerHTML = ("Cedula Válida");
          document.getElementById('save').style.display = 'block';
        }else{
          document.getElementById("cedulaMsj").innerHTML = ("Cedula Inválida");
          document.getElementById('save').style.display = 'none';
        }
      }
    }
  }
</script>
  </head>

  <body>
    <?php
      include("includes/headerAdministrador.php");
      include("includes/menuAdministrador.php");
    ?>

  <div class="page">
  <div class="container-fluid">

  <div class="row">
    <div class="col-md-6">
    </div>
  </div>

  <div class="row">
                    <div class="col-sm-3">
                    </div>
                    <div class="col-sm-6">
                      <br/>
                      <br/>
                      <br/>
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <span class="glyphicon glyphicon-edit"></span>
                                <span>Agregar Curso</span>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" method="POST" action="funciones/administrador/CrearCurso.php" class="clearfix">



                                    <div class="form-group">
                                        <label for="descripcion" class="control-label">Descripción</label>
                                        <input type="text" class="form-control" name="descripcion" value="" placeholder="Descripción" required>
                                    </div>
                                     <div class="form-group">
                                        <label for="precio" class="control-label">Precio</label>
                                        <label>$</label><input type="text" class="form-control" name="precio" value="" placeholder="Precio" required>
                                    </div>


                                    <div class="form-group clearfix">
                                         <center>

                                        <button type="submit" name="update" id="save" class="btn btn-info"  >Agregar</button>
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
