$(document).on("DOMContentLoaded", function () {
  $("#formLogin").on("submit", function (e) {
    e.preventDefault();
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    console.log(usuario.length);
    if (usuario == "" || password == "") {
      Swal.fire({
        icon: "warning",
        title: "Debe de ingresar un usuario y/o contraseña",
      });
      return false;
    } else {
      $.ajax({
        url: "../login.php",
        type: "POST",
        datatype: "json",
        data: { usuario: usuario, password: password },
        success: function (data) {
          if (data == 0) {
            Swal.fire({
              icon: "error",
              title: "Usuario y/o contraseña incorrecto",
            });
          } else {
            Swal.fire({
              icon: "success",
              title: "Conexion exitosa",
              confirmButtonColor: "#3085d6",
              confirmButtonText: "Ingresar",
            }).then((result) => {
              if (result.value) {
                if (usuario == "ADMIN_RACOM") {
                  window.location.href = "./dashboard/index.php";
                } else {
                  window.location.href = "./dashboard/buttons.php";
                }
              }
            });
          }
        },
        catch: function (error) {
          console.log(error);
        },
      });
    }
  });
});
