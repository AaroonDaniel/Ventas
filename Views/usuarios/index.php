<?php require_once "Views/Templates/header.php"; ?>

<div class="card">
    <div class="card-header">
        <div class="card-title">Lista de Usuarios</div>
    </div>
    <div class="card-body">
        <button class="btn btn-success" type="button"><i class="fas fa-plus"></i> Nuevo usuario</button>
        <table id="tblUsuarios" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nick</th>
                    <th>Nombre</th>
                    <th>Caja</th>
                    <th>Estado</th>
                    <th></th>

                </tr>
            </thead>
        </table>
    </div>
</div>

</body>

</html>

<?php require_once "Views/Templates/footer.php"; ?>