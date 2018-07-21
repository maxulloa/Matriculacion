<?php
function conectar() {
  $con = mysqli_connect("localhost","root","ups123") or die(mysqli_error());
  return $con;
}
?>
