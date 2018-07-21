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
    ?>


<div class="page">
  <div class="container-fluid">

<div class="row">
   <div class="col-md-6">
        </div>
</div>
  <div class="row">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> 5 </h2>
          <p class="text-muted">Usuarios</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-list"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> 6 </h2>
          <p class="text-muted">Cursos</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue">
          <i class="glyphicon glyphicon-shopping-cart"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> 4 </h2>
          <p class="text-muted">Productos</p>
        </div>

       </div>
    </div>










    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-yellow">
          <i class="glyphicon glyphicon-usd"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> 0</h2>
          <p class="text-muted">Ventas</p>
        </div>
       </div>
    </div>
</div>

  <div class="row">
   <div class="col-md-4">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Productos más vendidos</span>
         </strong>
       </div>
       <div class="panel-body">
         <table class="table table-striped table-bordered table-condensed">
          <thead>
           <tr>
             <th>Título</th>
             <th>Total vendido</th>
             <th>Cantidad total</th>
           <tr>
          </thead>
          <tbody>
                      <tbody>
         </table>
       </div>
     </div>
   </div>
   <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>ÚLTIMAS VENTAS</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
           <th class="text-center" style="width: 50px;">#</th>
           <th>Producto</th>
           <th>Fecha</th>
           <th>Venta total</th>
         </tr>
       </thead>
       <tbody>
                </tbody>
     </table>
    </div>
   </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Productos recientemente añadidos</span>
        </strong>
      </div>
      <div class="panel-body">

        <div class="list-group">
                  <a class="list-group-item clearfix" href="edit_product.php?id=5">
                <h4 class="list-group-item-heading">
                                   <img class="img-avatar img-circle" src="uploads/products/filter.jpg" alt="" />
                                NuevoCarro                  <span class="label label-warning pull-right">
                 $8989                  </span>
                </h4>
                <span class="list-group-item-text pull-right">
                CUROSONUUEVVOOO              </span>
          </a>
                  <a class="list-group-item clearfix" href="edit_product.php?id=4">
                <h4 class="list-group-item-heading">
                                   <img class="img-avatar img-circle" src="uploads/products/filter.jpg" alt="" />
                                Carro                  <span class="label label-warning pull-right">
                 $3                  </span>
                </h4>
                <span class="list-group-item-text pull-right">
                Repuestos              </span>
          </a>
                  <a class="list-group-item clearfix" href="edit_product.php?id=2">
                <h4 class="list-group-item-heading">
                                   <img class="img-avatar img-circle" src="uploads/products/filter.jpg" alt="" />
                                Compu                  <span class="label label-warning pull-right">
                 $3                  </span>
                </h4>
                <span class="list-group-item-text pull-right">
                Repuestos              </span>
          </a>
                  <a class="list-group-item clearfix" href="edit_product.php?id=1">
                <h4 class="list-group-item-heading">
                                   <img class="img-avatar img-circle" src="uploads/products/filter.jpg" alt="" />
                                Filtro de gasolina                  <span class="label label-warning pull-right">
                 $10                  </span>
                </h4>
                <span class="list-group-item-text pull-right">
                Repuestos              </span>
          </a>
          </div>
  </div>
 </div>
</div>
 </div>
  <div class="row">

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
