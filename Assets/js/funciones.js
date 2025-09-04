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
  document.getElementById("frmUsuario").reset();
  document.getElementById("id_usuario").value = "";
  document.getElementById("title").innerHTML = "Registrar Usuario";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  document.getElementById("claves").classList.remove('d-none');
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
      }else if(res == "mod"){
        Swal.fire({
          title: "Datos modificados con exito",
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

function btnEditarUsuario(id) {
  document.getElementById("title").innerHTML = "Actualizar Usuario";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Usuarios/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if(this.readyState == 4 && this.status == 200){
      const res = JSON.parse(this.responseText);
      document.getElementById("id_usuario").value = res.id_usuario;
      document.getElementById("nick").value = res.nick;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("id_caja").value = res.id_caja;
      document.getElementById("clave").value = 1;
      document.getElementById("claves").classList.add('d-none');
      $('#usuarioModal').modal('show');

    }
  }
  
}

function btnInactivarUsuario(id) {
  Swal.fire({
    title: "¿Quieres inactivar el usuario?",
    text: "El usuario no se eliminara, solo se inactivara",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, inactivar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Usuarios/inactivar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblUsuarios.ajax.reload();
        
      }
      Swal.fire({
        title: "Registrando inactivado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000
      });
    }
  });
}

function btnActivarUsuario(id) {
  Swal.fire({
    title: "¿Estas seguro de activar el usuario?",
    text: "",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Usuarios/activar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblUsuarios.ajax.reload();
        
      }
      Swal.fire({
        title: "Registrado activado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000
      });
    }
  });
}