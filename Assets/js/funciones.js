let tblUsuarios;
document.addEventListener("DOMContentLoaded", function () {
  tblUsuarios = $("#tblUsuarios").DataTable({
    ajax: {
      url: base_url + "Usuarios/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id_usuario" },
      { data: "nick" },
      { data: "nombre" },
      { data: "caja" },
      { data: "usuario_estado" },
      { data: "acciones" },
    ],
    language: {
      decimal: "",
      emptyTable: "No hay información",
      info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
      infoFiltered: "(Filtrado de _MAX_ total entradas)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Mostrar _MENU_ Entradas",
      loadingRecords: "Cargando...",
      processing: "Procesando...",
      search: "Buscar:",
      zeroRecords: "Sin resultados encontrados",
      paginate: {
        first: "Primero",
        last: "Ultimo",
        next: "Siguiente",
        previous: "Anterior",
      },
    },
  });
});

function frmUsuario() {
  $("#usuarioModal").modal("show");
}

function registrarUsuario(e) {
  e.preventDefault();
  const nick = document.getElementById("nick");
  const nombre = document.getElementById("nombre");
  const clave = document.getElementById("clave");
  if (nick.value == "" || nombre.value == "" || clave.value == "") {
    Swal.fire({
      title: "Alerta",
      text: "Los campos son obligatorios",
      icon: "warning",
    });
  } else {
    const url = base_url + "Usuarios/registrar";
    const frm = document.getElementById("frmUsuario");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      const res = JSON.parse(this.responseText);
      if (res == "si") {
        Swal.fire({
          title: "Datos registrados",
          text: "",
          icon: "success",
          showConfirmButton: false,
          timer: 2000
        })
        $("#usuarioModal").modal("hide")
        tblUsuarios.ajax.reload();
      }else{
        Swal.fire({
          title: "Error!",
          text: res,
          icon: "error",
          timmer: 4000
        })
      }
    };
  }
}
