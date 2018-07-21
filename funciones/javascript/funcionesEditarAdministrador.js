$(document).ready(function()
{
  $("#btnEditarAdministrador").click(function(event) {
    var id = $("#id").val();
    var cedula = $("#cedula").val();
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var correo = $("#correo").val();
    var password = $("#password").val();
    var rol = $("#rol").val();
    if (cedula == "" || nombre == "" || apellido == "" || correo == "" || password == ""){
      document.getElementById('msgCedulaInvalida').style.display = 'none';
      document.getElementById('msgDataActualizada').style.display = 'none';
      document.getElementById('msgDataNoActualizada').style.display = 'none';
      document.getElementById('msgDataIncompleta').style.display = 'block';
    } else {
      $.post("funciones/administrador/actualizaDatosAdministradorSecretaria.php",
      {
        id: id,
        cedula: cedula,
        nombre: nombre,
        apellido: apellido,
        correo: correo,
        password: password,
        rol: rol,
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
