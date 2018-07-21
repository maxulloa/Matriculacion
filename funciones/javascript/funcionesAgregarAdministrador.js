$(document).ready(function()
{
  $("#btnAgregarAdministrador").click(function(event) {
    var cedula = $("#cedula").val();
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var correo = $("#correo").val();
    var password = $("#password").val();
    var rol = $("#rol").val();
    if (cedula == "" || nombre == "" || apellido == "" || correo == "" || password == "" || rol == ""){
      document.getElementById('msgCedulaInvalida').style.display = 'none';
      document.getElementById('msgDataActualizada').style.display = 'none';
      document.getElementById('msgDataNoActualizada').style.display = 'none';
      document.getElementById('msgDataIncompleta').style.display = 'block';
    } else {
      $.post("funciones/administrador/crearAdministrador.php",
      {
        cedula: cedula,
        nombre: nombre,
        apellido: apellido,
        correo: correo,
        password: password,
        rol: rol,
      },
      function(result){
        if (result == "DatosIngresados" ) {
          document.getElementById('msgCedulaInvalida').style.display = 'none';
          document.getElementById('msgDataNoActualizada').style.display = 'none';
          document.getElementById('msgDataIncompleta').style.display = 'none';
          document.getElementById('msgDataActualizada').style.display = 'block';
          document.getElementById('cedula').value = "";
          document.getElementById('nombre').value = "";
          document.getElementById('apellido').value = "";
          document.getElementById('correo').value = "";
          document.getElementById('password').value = "";
          document.getElementById('rol').value = "Administrador";
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
