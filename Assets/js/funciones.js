let tblUsuarios;
let tblCajas;
let tblClientes;
let tblCategorias;
let tblMedidas;
let tblProductos;
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

  tblCajas = $("#tblCajas").DataTable({
    ajax: {
      url: base_url + "Cajas/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id_caja" },
      { data: "caja" },
      { data: "caja_estado" },
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

  tblClientes = $("#tblClientes").DataTable({
    ajax: {
      url: base_url + "Clientes/listar",
      dataSrc: "",
    },
    columns: [
      { data: "razon_social" },
      { data: "documentoid" },
      { data: "complementoid" },
      { data: "cliente_email" },
      { data: "cliente_estado" },
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
  tblCategorias = $("#tblCategorias").DataTable({
    ajax: {
      url: base_url + "Categorias/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id_categoria" },
      { data: "nombre_categoria" },
      { data: "codigoProductoSin" },
      { data: "categoria_estado" },
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
  tblMedidas = $("#tblMedidas").DataTable({
    ajax: {
      url: base_url + "Medidas/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id_medida" },
      { data: "descripcion_medida" },
      { data: "descripcion_corta" },
      { data: "unidad_siat" },
      { data: "medida_estado" },
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
  tblProductos = $("#tblProductos").DataTable({
    ajax: {
      url: base_url + "Productos/listar",
      dataSrc: "",
    },
    columns: [
      { data: "codigo" },
      { data: "codigoProductoSin" },
      { data: "nombre_producto" },
      { data: "nombre_categoria" },
      { data: "descripcion_medida" },
      { data: "costo_compra" },
      { data: "precio_venta" },
      { data: "cantidad" },
      { data: "producto_estado" },
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

//USUARIOS
function frmUsuario() {
  document.getElementById("frmUsuario").reset();
  document.getElementById("id_usuario").value = "";
  document.getElementById("title").innerHTML = "Registrar Usuario";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  document.getElementById("claves").classList.remove("d-none");
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
      if (this.readyState == 4 && this.status == 200) {
        try {
          const res = JSON.parse(this.responseText);
          if (res == "si") {
            Swal.fire({
              title: "Datos registrados",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#usuarioModal").modal("hide");
            tblUsuarios.ajax.reload();
          } else if (res == "mod") {
            Swal.fire({
              title: "Datos modificados con exito",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#usuarioModal").modal("hide");
            tblUsuarios.ajax.reload();
          } else {
            Swal.fire({
              title: "Error!",
              text: res,
              icon: "error",
              timer: 4000,
            });
          }
        } catch (error) {
          console.error("Error al parsear JSON:", this.responseText);
          Swal.fire({
            title: "Error",
            text: "Error inesperado en el servidor",
            icon: "error",
          });
        }
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
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id_usuario").value = res.id_usuario;
      document.getElementById("nick").value = res.nick;
      document.getElementById("nombre").value = res.nombre;
      document.getElementById("id_caja").value = res.id_caja;
      document.getElementById("clave").value = 1;
      document.getElementById("claves").classList.add("d-none");
      $("#usuarioModal").modal("show");
    }
  };
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
      };
      Swal.fire({
        title: "Registrando inactivado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
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
      };
      Swal.fire({
        title: "Registrado activado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

//CAJAS
function frmCaja() {
  document.getElementById("frmCaja").reset();
  document.getElementById("id_caja").value = "";
  document.getElementById("title").innerHTML = "Nueva Caja";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  $("#cajaModal").modal("show");
}

function registrarCaja(e) {
  e.preventDefault();
  const caja = document.getElementById("caja");
  if (caja.value == "") {
    Swal.fire({
      title: "Alerta",
      text: "Los campos son obligatorios",
      icon: "warning",
    });
  } else {
    const url = base_url + "Cajas/registrar";
    const frm = document.getElementById("frmCaja");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        try {
          const res = JSON.parse(this.responseText);
          if (res == "si") {
            Swal.fire({
              title: "Datos registrados",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#cajaModal").modal("hide");
            tblCajas.ajax.reload();
          } else if (res == "mod") {
            Swal.fire({
              title: "Datos modificados con exito",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#cajaModal").modal("hide");
            tblCajas.ajax.reload();
          } else {
            Swal.fire({
              title: "Error!",
              text: res,
              icon: "error",
              timer: 4000,
            });
          }
        } catch (error) {
          console.error("Error al parsear JSON:", this.responseText);
          Swal.fire({
            title: "Error",
            text: "Error inesperado en el servidor",
            icon: "error",
          });
        }
      }
    };
  }
}

function btnEditarCaja(id) {
  document.getElementById("title").innerHTML = "Actualizar Caja";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Cajas/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id_caja").value = res.id_caja;
      document.getElementById("caja").value = res.caja;
      $("#cajaModal").modal("show");
    }
  };
}

function btnInactivarCaja(id) {
  Swal.fire({
    title: "¿Quieres inactivar la caja?",
    text: "La caja no se eliminara, solo se inactivara",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, inactivar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Cajas/inactivar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblCajas.ajax.reload();
      };
      Swal.fire({
        title: "Registrando inactivado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

function btnActivarCaja(id) {
  Swal.fire({
    title: "¿Estas seguro de activar la caja?",
    text: "",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Cajas/activar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblCajas.ajax.reload();
      };
      Swal.fire({
        title: "Registrado activado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

//CLIENTES
function frmCliente() {
  document.getElementById("frmCliente").reset();
  document.getElementById("id_cliente").value = "";
  document.getElementById("title").innerHTML = "Nuevo Cliente";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  $("#clienteModal").modal("show");
}

function registrarCliente(e) {
  e.preventDefault();
  const documentoid = document.getElementById("documentoid");
  const razon_social = document.getElementById("razon_social");
  if (documentoid.value == "" || razon_social.value == "") {
    Swal.fire({
      title: "Alerta",
      text: "Los campos son obligatorios",
      icon: "warning",
    });
  } else {
    const url = base_url + "Clientes/registrar";
    const frm = document.getElementById("frmCliente");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        try {
          const res = JSON.parse(this.responseText);
          if (res == "si") {
            Swal.fire({
              title: "Datos registrados",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#clienteModal").modal("hide");
            tblClientes.ajax.reload();
          } else if (res == "mod") {
            Swal.fire({
              title: "Datos modificados con exito",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#clienteModal").modal("hide");
            tblClientes.ajax.reload();
          } else {
            Swal.fire({
              title: "Error!",
              text: res,
              icon: "error",
              timer: 4000,
            });
          }
        } catch (error) {
          console.error("Error al parsear JSON:", this.responseText);
          Swal.fire({
            title: "Error",
            text: "Error inesperado en el servidor",
            icon: "error",
          });
        }
      }
    };
  }
}

function btnEditarCliente(id) {
  document.getElementById("title").innerHTML = "Actualizar Cliente";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Clientes/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id_cliente").value = res.id_cliente;
      document.getElementById("documentoid").value = res.documentoid;
      document.getElementById("complementoid").value = res.complementoid;
      document.getElementById("razon_social").value = res.razon_social;
      document.getElementById("cliente_email").value = res.cliente_email;
      $("#clienteModal").modal("show");
    }
  };
}

function btnInactivarCliente(id) {
  Swal.fire({
    title: "¿Quieres inactivar al cliente?",
    text: "El cliente no se eliminara, solo se inactivara",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, inactivar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Clientes/inactivar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblClientes.ajax.reload();
      };
      Swal.fire({
        title: "Registrando inactivado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

function btnActivarCliente(id) {
  Swal.fire({
    title: "¿Estas seguro de activar el cliente?",
    text: "",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Clientes/activar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblClientes.ajax.reload();
      };
      Swal.fire({
        title: "Registrado activado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

//CATEGORIAS
function frmCategoria() {
  document.getElementById("frmCategoria").reset();
  document.getElementById("id_categoria").value = "";
  document.getElementById("title").innerHTML = "Nueva Categoria";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  $("#categoriaModal").modal("show");
}

function registrarCategoria(e) {
  e.preventDefault();
  const nombre_categoria = document.getElementById("nombre_categoria");
  const codigoProductoSin = document.getElementById("codigoProductoSin");
  if (nombre_categoria.value == "" || codigoProductoSin.value == "") {
    Swal.fire({
      title: "Alerta",
      text: "Los campos son obligatorios",
      icon: "warning",
    });
  } else {
    const url = base_url + "Categorias/registrar";
    const frm = document.getElementById("frmCategoria");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        try {
          const res = JSON.parse(this.responseText);
          if (res == "si") {
            Swal.fire({
              title: "Datos registrados",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#categoriaModal").modal("hide");
            tblCategorias.ajax.reload();
          } else if (res == "mod") {
            Swal.fire({
              title: "Datos modificados con exito",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#categoriaModal").modal("hide");
            tblCategorias.ajax.reload();
          } else {
            Swal.fire({
              title: "Error!",
              text: res,
              icon: "error",
              timer: 4000,
            });
          }
        } catch (error) {
          console.error("Error al parsear JSON:", this.responseText);
          Swal.fire({
            title: "Error",
            text: "Error inesperado en el servidor",
            icon: "error",
          });
        }
      }
    };
  }
}

function btnEditarCategoria(id) {
  document.getElementById("title").innerHTML = "Actualizar Categoria";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Categorias/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id_categoria").value = res.id_categoria;
      document.getElementById("nombre_categoria").value = res.nombre_categoria;
      document.getElementById("codigoProductoSin").value =
        res.codigoProductoSin;
      $("#categoriaModal").modal("show");
    }
  };
}

function btnInactivarCategoria(id) {
  Swal.fire({
    title: "¿Quieres inactivar la categoria?",
    text: "La categoria no se eliminara, solo se inactivara",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, inactivar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Categorias/inactivar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblCategorias.ajax.reload();
      };
      Swal.fire({
        title: "Registrando inactivado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

function btnActivarCategoria(id) {
  Swal.fire({
    title: "¿Estas seguro de activar la categoria?",
    text: "",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Categorias/activar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblCategorias.ajax.reload();
      };
      Swal.fire({
        title: "Registrado activado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

//MEDIDAS
function frmMedida() {
  document.getElementById("frmMedida").reset();
  document.getElementById("id_medida").value = "";
  document.getElementById("title").innerHTML = "Nueva Medida";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  $("#medidaModal").modal("show");
}

function registrarMedida(e) {
  e.preventDefault();
  const descripcion_medida = document.getElementById("descripcion_medida");
  const descripcion_corta = document.getElementById("descripcion_corta");
  const unidad_siat = document.getElementById("unidad_siat");
  if (
    descripcion_medida.value == "" ||
    descripcion_corta.value == "" ||
    unidad_siat.value == ""
  ) {
    Swal.fire({
      title: "Alerta",
      text: "Los campos son obligatorios",
      icon: "warning",
    });
  } else {
    const url = base_url + "Medidas/registrar";
    const frm = document.getElementById("frmMedida");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        try {
          const res = JSON.parse(this.responseText);
          if (res == "si") {
            Swal.fire({
              title: "Datos registrados",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#medidaModal").modal("hide");
            tblMedidas.ajax.reload();
          } else if (res == "mod") {
            Swal.fire({
              title: "Datos modificados con exito",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#medidaModal").modal("hide");
            tblMedidas.ajax.reload();
          } else {
            Swal.fire({
              title: "Error!",
              text: res,
              icon: "error",
              timer: 4000,
            });
          }
        } catch (error) {
          console.error("Error al parsear JSON:", this.responseText);
          Swal.fire({
            title: "Error",
            text: "Error inesperado en el servidor",
            icon: "error",
          });
        }
      }
    };
  }
}

function btnEditarMedida(id) {
  document.getElementById("title").innerHTML = "Actualizar Medida";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Medidas/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id_medida").value = res.id_medida;
      document.getElementById("descripcion_medida").value =
        res.descripcion_medida;
      document.getElementById("descripcion_corta").value =
        res.descripcion_corta;
      document.getElementById("unidad_siat").value = res.unidad_siat;
      $("#medidaModal").modal("show");
    }
  };
}

function btnInactivarMedida(id) {
  Swal.fire({
    title: "¿Quieres inactivar la medida?",
    text: "La medida no se eliminara, solo se inactivara",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, inactivar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Medidas/inactivar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblMedidas.ajax.reload();
      };
      Swal.fire({
        title: "Registrando inactivado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

function btnActivarMedida(id) {
  Swal.fire({
    title: "¿Estas seguro de activar la medida?",
    text: "",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Medidas/activar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblMedidas.ajax.reload();
      };
      Swal.fire({
        title: "Registrado activado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

//PRODUCTOS
function frmProducto() {
  document.getElementById("frmProducto").reset();
  document.getElementById("id_producto").value = "";
  document.getElementById("title").innerHTML = "Nuevo Producto";
  document.getElementById("btnAccion").innerHTML = "Guardar";
  $("#productoModal").modal("show");
}

function registrarProducto(e) {
  e.preventDefault();
  const codigo = document.getElementById("codigo");
  const nombre_producto = document.getElementById("nombre_producto");
  if (codigo.value == "" || nombre_producto.value == "") {
    Swal.fire({
      title: "Alerta",
      text: "Los campos son obligatorios",
      icon: "warning",
    });
  } else {
    const url = base_url + "Productos/registrar";
    const frm = document.getElementById("frmProducto");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        try {
          const res = JSON.parse(this.responseText);
          if (res == "si") {
            Swal.fire({
              title: "Datos registrados",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#productoModal").modal("hide");
            tblProductos.ajax.reload();
          } else if (res == "mod") {
            Swal.fire({
              title: "Datos modificados con exito",
              text: "",
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            $("#productoModal").modal("hide");
            tblProductos.ajax.reload();
          } else {
            Swal.fire({
              title: "Error!",
              text: res,
              icon: "error",
              timer: 4000,
            });
          }
        } catch (error) {
          console.error("Error al parsear JSON:", this.responseText);
          Swal.fire({
            title: "Error",
            text: "Error inesperado en el servidor",
            icon: "error",
          });
        }
      }
    };
  }
}

function btnEditarProducto(id) {
  document.getElementById("title").innerHTML = "Actualizar Producto";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Productos/editar/" + id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      document.getElementById("id_producto").value = res.id_producto;
      document.getElementById("codigo").value = res.codigo;
      document.getElementById("nombre_producto").value = res.nombre_producto;
      document.getElementById("costo_compra").value = res.costo_compra;
      document.getElementById("precio_venta").value = res.precio_venta;
      document.getElementById("cantidad").value = res.cantidad;
      document.getElementById("id_categoria").value = res.id_categoria;
      document.getElementById("id_medida").value = res.id_medida;
      $("#productoModal").modal("show");
    }
  };
}

function btnInactivarProducto(id) {
  Swal.fire({
    title: "¿Quieres inactivar al producto?",
    text: "El producto no se eliminara, solo se inactivara",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, inactivar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Productos/inactivar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblProductos.ajax.reload();
      };
      Swal.fire({
        title: "Registrando inactivado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

function btnActivarProducto(id) {
  Swal.fire({
    title: "¿Estas seguro de activar el producto?",
    text: "",
    icon: "warning",
    showcancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, confirmar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "Productos/activar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        console.log(this.responseText);
        tblProductos.ajax.reload();
      };
      Swal.fire({
        title: "Registrado activado",
        text: "",
        icon: "success",
        showConfirmButton: false,
        timer: 2000,
      });
    }
  });
}

//PEDIDOS

function buscarCliente() {
  let documentoid = document.getElementById("documentoid").value;
  $.ajax({
    type: "POST",
    url: base_url + "Pedidos/buscarCliente",
    data: { documentoid: documentoid },
    dataType: "json",
    success: function (data) {
      if (data == "error") {
        Swal.fire({
          title: "El cliente no existe",
          text: "",
          icon: "error",
          timer: 2000,
        });
      } else {
        document.getElementById("razon_social").value = data["razon_social"];
        document.getElementById("cliente_email").value = data["cliente_email"];
      }
    },
  });
}

function buscarProducto() {
  let codigo = document.getElementById("codigo").value;
  $.ajax({
    type: "POST",
    url: base_url + "Pedidos/buscarProducto",
    data: { codigo: codigo },
    dataType: "json",
    success: function (data) {
      console.log(data);
      if (data == "error") {
        Swal.fire({
          title: "El producto no existe",
          text: "",
          icon: "error",
          timer: 2000,
        });
      } else {
        document.getElementById("nombre_producto").value = data["nombre_produto"]
        document.getElementById("descripcion_corta").value = data["descripcion_corta"]
        document.getElementById("cantidad").value = 1
        document.getElementById("precio_venta").value = data["precio_venta"]
        document.getElementById("descProducto").value = "0.00"
        document.getElementById("sTotal").value = data["precio_venta"]
        document.getElementById("unidad_siat").value = data["unidad_siat"]
        document.getElementById("codigoProductoSin").value = data["codigoProductoSin"]


      }
    }
  });
}

function calcularstotal() {
  let totalPedido = 0
  for(var i=0; i<arrayProductos.length; i++){
    totalPedido += parseFloat(arrayProductos[i].sTotal)
  }
  document.getElementById("subTotal").value= totalPedido.toFixed(2)
  let descAdicional = document.getElementById("descAdicional").value
  document.getElementById("total").value = (totalPedido - descAdicional).toFixed(2)
  let cantidad = document.getElementById("cantidad").value
  let precio_venta = document.getElementById("precio_venta").value
  let descProducto = document.getElementById("descProducto").value
  document.getElementById("sTotal").value = ((cantidad * precio_venta) - descProducto).toFixed(2)
}


var arrayProductos = []
var detalles = document.getElementById("detalles")

function cargarProductos() {
  let codigo = document.getElementById("codigo").value
  let codigoProductoSin = document.getElementById("codigoProductoSin").value
  let nombre_producto = document.getElementById("nombre_producto").value
  let precio_venta = document.getElementById("precio_venta").value
  let cantidad = document.getElementById("cantidad").value
  let descProducto = document.getElementById("descProducto").value
  let sTotal = document.getElementById("sTotal").value


  let detallesobs = {
    codigo: codigo,
    codigoProductoSin: codigoProductoSin,
    nombre_producto: nombre_producto,
    precio_venta: precio_venta,
    cantidad: cantidad,
    descProducto: descProducto,
    sTotal: sTotal
  }
  arrayProductos.push(detallesobs)
  armarPedido()


  document.getElementById("codigo").value = ""
  document.getElementById("nombre_producto").value = ""
  document.getElementById("precio_venta").value = ""   
  document.getElementById("cantidad").value = ""
  document.getElementById("descProducto").value = ""
  document.getElementById("sTotal").value = ""
  document.getElementById("descripcion_corta").value=""
  document.getElementById("codigoProductoSin").value = ""

}

function armarPedido() {
  detalles.innerHTML = ""
  arrayProductos.forEach((detalle) => {
    let fila = document.createElement("tr")
    fila.innerHTML = '<td>' + detalle.codigo + '</td>' +
      '<td>' + detalle.nombre_producto + '</td>' +
      '<td>' + detalle.precio_venta + '</td>' +
      '<td>' + detalle.cantidad + '</td>' +
      '<td>' + detalle.descProducto + '</td>' +
      '<td>' + detalle.sTotal + '</td>'

    let tdEliminar = document.createElement("td")
    let botonEliminar = document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger")
    botonEliminar.innerHTML = '<i class="fas fa-trash"></i>'
    botonEliminar.onclick = () =>{
      eliminarProducto(detalle.codigo )
    }
    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    detalles.appendChild(fila) 
  
  })
  calcularstotal()
}

function eliminarProducto(codigo){
   arrayProductos = arrayProductos.filter((detalle) =>{
    if(codigo != detalle.codigo){
      return detalle
    }
  })
  armarPedido()
}