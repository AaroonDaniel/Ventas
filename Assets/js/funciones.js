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
        ]
           
    })
})