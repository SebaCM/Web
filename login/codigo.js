$(document).on("DOMContentLoaded", function () {
  $("#formLogin").on("submit", function (e) {
    e.preventDefault();
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    if (usuario == "" || password == "") {
      Swal.fire({
        icon: "warning",
        title: "Debe de ingresar un usuario y/o contraseña",
      });
      return false;
    } else {
      $.ajax({
        url: "./verificacion.php",
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
              var dt = JSON.parse(data);
              if (result.value) {
                if (usuario) {
                  console.log(dt[0].id);
                  console.log(dt[0].Usuario);
                  $.ajax({
                    url: "./cookies.php",
                    type: "POST",
                    data: {
                      id: dt[0].id,
                      user: dt[0].Usuario,
                      ip:dt[0].IP,
                    },
                  }).done(function () {
                    Swal.fire({
                      title: "Bienvenido a RACOM MQTT",
                      timer: 1500,
                      showConfirmButton: false,
                    });   
                    location.reload(true);
                  });
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
