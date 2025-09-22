//PEDIDOS
function buscarCliente() {
    let documentoid = document.getElementById("documentoid").value
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
                    timer: 2000
                })
            } else {
                document.getElementById("id_cliente").value = data["id_cliente"]
                document.getElementById("complementoid").value = data["complementoid"]
                document.getElementById("razon_social").value = data["razon_social"]
                document.getElementById("cliente_email").value = data["cliente_email"]
            }
        }
    })
}

function buscarProducto() {
    let codigo = document.getElementById("codigo").value
    $.ajax({
        type: "POST",
        url: base_url + "Pedidos/buscarProducto",
        data: { codigo: codigo },
        dataType: "json",
        success: function (data) {
            //console.log(data)
            if (data == "error") {
                Swal.fire({
                    title: "El producto no existe",
                    text: "",
                    icon: "error",
                    timer: 2000
                })
            } else {
                document.getElementById("nombre_producto").value = data["nombre_producto"]
                document.getElementById("descripcion_corta").value = data["descripcion_corta"]
                document.getElementById("cantidad").value = 1
                document.getElementById("precio_venta").value = data["precio_venta"]
                document.getElementById("descProducto").value = "0.00"
                document.getElementById("sTotal").value = data["precio_venta"]
                document.getElementById("unidad_siat").value = data["unidad_siat"]
                document.getElementById("codigoProductoSin").value = data["codigoProductoSin"]
            }
        }
    })
}

function calcularstotal() {
    let totalPedido = 0
    for (var i = 0; i < arrayProductos.length; i++) {
        totalPedido += parseFloat(arrayProductos[i].subTotal)
    }
    document.getElementById("subTotal").value = totalPedido.toFixed(2)
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
    let actEconomica = document.getElementById("actEconomica").value
    let codigo = document.getElementById("codigo").value
    let codigoProductoSin = document.getElementById("codigoProductoSin").value
    let nombre_producto = document.getElementById("nombre_producto").value
    let unidad_siat = document.getElementById("unidad_siat").value
    let precio_venta = document.getElementById("precio_venta").value
    let cantidad = parseFloat(document.getElementById("cantidad").value).toFixed(2)
    let descProducto = document.getElementById("descProducto").value
    let sTotal = document.getElementById("sTotal").value

    let detallesobj = {
        actividadEconomica: actEconomica,
        codigoProductoSin: codigoProductoSin,
        codigoProducto: codigo,
        descripcion: nombre_producto,
        cantidad: cantidad,
        unidadMedida: unidad_siat,
        precioUnitario: precio_venta,
        montoDescuento: descProducto,
        subTotal: sTotal,
        numeroSerie: null,
        numeroImei: null
    }

    arrayProductos.push(detallesobj)
    armarPedido()

    document.getElementById("codigo").value = ""
    document.getElementById("nombre_producto").value = ""
    document.getElementById("precio_venta").value = ""
    document.getElementById("cantidad").value = ""
    document.getElementById("descProducto").value = ""
    document.getElementById("sTotal").value = ""
    document.getElementById("descripcion_corta").value = ""
    document.getElementById("unidad_siat").value = ""
    document.getElementById("codigoProductoSin").value = ""
}

function armarPedido() {
    detalles.innerHTML = ""
    arrayProductos.forEach((detalle) => {
        let fila = document.createElement("tr")
        fila.innerHTML = '<td>' + detalle.codigoProducto + '</td>' +
            '<td>' + detalle.descripcion + '</td>' +
            '<td>' + detalle.precioUnitario + '</td>' +
            '<td>' + detalle.cantidad + '</td>' +
            '<td>' + detalle.montoDescuento + '</td>' +
            '<td>' + detalle.subTotal + '</td>'

        let tdEliminar = document.createElement("td")
        let botonEliminar = document.createElement("button")
        botonEliminar.classList.add("btn", "btn-danger")
        botonEliminar.innerHTML = '<i class="fas fa-trash"></i>'
        botonEliminar.onclick = () => {
            eliminarProducto(detalle.codigoProducto)
        }

        tdEliminar.appendChild(botonEliminar)
        fila.appendChild(tdEliminar)
        detalles.appendChild(fila)
    })
    calcularstotal()
}

function eliminarProducto(codigo) {
    arrayProductos = arrayProductos.filter((detalle) => {
        if (codigo != detalle.codigoProducto) {
            return detalle
        }
    })
    armarPedido()
}

function verificarComunicacion() {
    $.ajax({
        type: "POST",
        url: base_url + "Pedidos/verificarComunicacion",
        cache: false,
        dataType: "json",
        success: function (data) {
            if (data.RespuestaComunicacion.transaccion == true) {
                document.getElementById("comunicacionSiat").innerHTML = data.RespuestaComunicacion.mensajesList.descripcion
                document.getElementById("comunicacionSiat").className = "badge badge-success"
            } else {
                document.getElementById("comunicacionSiat").innerHTML = "DESCONECTADO"
                document.getElementById("comunicacionSiat").className = "badge badge-secondary"
            }
        }
    })
}

function cuis() {
    $.ajax({
        type: "POST",
        url: base_url + "Pedidos/cuis",
        cache: false,
        dataType: "json",
        success: function (data) {
            console.log(data)
        }
    })
}

verificarComunicacion()
cuis()

function cufd(){
    $.ajax({
        type: "POST",
        url: base_url + "Pedidos/cufd",
        cache: false,
        dataType: "json",
        success: function(data){
            if(data.RespuestaCufd.transaccion == true){
                document.getElementById("cufd").innerHTML = "CUFD vigente " + data.RespuestaCufd.fechaVigencia.substring(0,16)
            }else{
                document.getElementById("cufd").innerHTML = "No existe CUFD vigente"
            }
        }
    })
}
cufd()


function emitirFactura(){
    let numeroFactura = document.getElementById("nrofactura").value
    let cuf = "123456"
    let cufd = document.getElementById("cufdValor").value
    var diferencia  = new Date().getTimezoneOffset() * 60000
    let fechaEmision = new Date(Date.now()-diferencia).toISOString().slice(0, -1)
    let nombreRazonSocial = document.getElementById("razon_social").value
    let codigoTipoDocumentoIdentidad = document.getElementById("tipoDocumento")
    let numeroDocumento = document.getElementById("documentoid").value
    let complementoid = document.getElementById("complementoid").value
    let codigoCliente = document.getElementById("documentoid").value
    let codigoMetodoPago = 1
    let numeroTarjeta = null
    

    //2025-09-22T20:26:31.275Z
    //2025-09-22T16:30:09.379Z
    //2025-09-22T16:33:15.587
    console.log(fechaEmision)
}