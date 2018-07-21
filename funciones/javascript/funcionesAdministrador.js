$(document).ready(function()
{
  $("#btnUpdateAdministrador").click(function(event) {
    var cedula = $("#cedula").val();
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var correo = $("#correo").val();
    if (cedula == "" || nombre == "" || apellido == "" || correo == ""){
      document.getElementById('msgCedulaInvalida').style.display = 'none';
      document.getElementById('msgDataActualizada').style.display = 'none';
      document.getElementById('msgDataNoActualizada').style.display = 'none';
      document.getElementById('msgDataIncompleta').style.display = 'block';
    } else {
      $.post("funciones/administrador/actualizaDatosAdministrador.php",
      {
        cedula: cedula,
        nombre: nombre,
        apellido: apellido,
        correo: correo,
      },
      function(result){
        if (result == "DatosActualizados" ) {
          document.getElementById('msgCedulaInvalida').style.display = 'none';
          document.getElementById('msgDataNoActualizada').style.display = 'none';
          document.getElementById('msgDataIncompleta').style.display = 'none';
          document.getElementById('msgDataActualizada').style.display = 'block';
        } else {
          if (result == "CedulaInvalida") {
            document.getElementById('msgDataNoActualizada').style.display = 'none';
            document.getElementById('msgDataIncompleta').style.display = 'none';
            document.getElementById('msgDataActualizada').style.display = 'none';
            document.getElementById('msgCedulaInvalida').style.display = 'block';
          } else {
            document.getElementById('msgCedulaInvalida').style.display = 'none';
            document.getElementById('msgDataIncompleta').style.display = 'none';
            document.getElementById('msgDataActualizada').style.display = 'none';
            document.getElementById('msgDataNoActualizada').style.display = 'block';
          }
        }
      });
    }
  });
});
