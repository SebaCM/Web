$(function () {
  var op;
  op = 4;
  tablaClientes = $("#tablaClientes").DataTable({
    ajax: {
      url: "vendor/orde.php",
      method: "POST",
      data: { Opcion: op },
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "Usuario" },
      { data: "Contraseña" },
      { data: "IP" },
      { data: "Modificacion" },
      {
        defaultContent:
          "<div class='text-center><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnEliminar'>Eliminar</button></div></div>",
      },
    ],
    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron registros",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Ultimo",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },
  });
  $("#btnNuevo").on("click", function () {
    $("#formPersonas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Usuario");
    $("#modalCRUD").modal("show");
    id = null;
    op = 1;
  });
  $(document).on("click", ".btnEditar", function () {
    fila = $(this).closest("tr");
    id = parseInt(fila.find("td:eq(0)").text());
    Usuario = fila.find("td:eq(1)").text();
    Contraseña = fila.find("td:eq(2)").text();
    Ip = fila.find("td:eq(3)").text();
    $("#Usuario").val(Usuario);
    $("#Contraseña").val(Contraseña);
    $("#IP").val(Ip);
    op = 2;
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Usuario");
    $("#modalCRUD").modal("show");
  });
  $(document).on("click", ".btnEliminar", function () {
    fila = $(this).closest("tr");
    id = parseInt($(this).closest("tr").find("td:eq(0)").text());
    Usuario = fila.find("td:eq(1)").text();
    respuesta = confirm(
      "¿Estas seguro de eliminar al usuario " + Usuario + "?"
    );
    console.log(respuesta);
    if (respuesta) {
      $.ajax({
        url: "vendor/orde.php",
        type: "POST",
        dataType: "json",
        data: {
          Opcion: 3,
          Id: id,
          Usuario: Usuario,
        },
        success: function (data) {
          console.log(data);
          tablaClientes.ajax.reload(null, true);
          tablaClientes.row($(this).parents("tr")).remove().draw();
          tablaClientes.ajax.reload(null, true);
        },
      });
    }
    tablaClientes.ajax.reload(null, true);
  });
  tablaClientes.ajax.reload(null, true);
  $("#formPersonas").on("submit", function (e) {
    console.log("Se presiona");
    e.preventDefault();
    usuario = $.trim($("#Usuario").val());
    contraseña = $.trim($("#Contraseña").val());
    Ip = $.trim($("#IP").val());
    $.ajax(
      {
        url: "vendor/orde.php",
        type: "POST",
        dataType: "json",
        data: {
          Id: id,
          Usuario: usuario,
          Contraseña: contraseña,
          IP: Ip,
          Opcion: op,
        },
        success: function () {
          tablaClientes.ajax.reload(null, true);
        },
      },
      $("#modalCRUD").modal("hide")
    );
  });
  var n = 0;
  $(document).on("click", "#btnDecode", function () {
    var contraseñas = tablaClientes.column(2).data();
    if (n == 0) {
      const decoded = [];
      for (let i = 0; i < contraseñas.length; i++) {
        decoded[i] = atob(contraseñas[i]);
        tablaClientes.cell(i, 2).data(decoded[i]).draw();
        n = 1;
      }
    } else {
      tablaClientes.ajax.reload(null, true);
      n = 0;
    }
  });
});
