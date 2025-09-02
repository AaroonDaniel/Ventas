let tblUsuarios
document.addEventListener('DOMContentLoaded', function () {
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax:{
            url: base_url + 'Usuarios/listar',
            dataSrc: ''
        },
        columns:[
            {'data': 'id_usuario'},
            {'data': 'nick'},
            {'data': 'nombre'},
            {'data': 'caja'},
            {'data': 'usuario_estado'},
            {'data': 'acciones'}
        ],
        language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
           
    })
})

function frmUsuario(){
    $('#usuarioModal').modal('show')
}

function registrarUsuario(e){
    e.preventDefault()
    const nick = document.getElementById('nick')
    const nombre = document.getElementById('nombre')
    const clave = document.getElementById('clave')
    if(nick.value == '' || nombre.value == '' || clave.value == ''){
        alert('Todos los campos son obligatorios','warning')
    }else{
        alert('Datos enviados')
    }
}