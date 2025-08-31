<?php require_once "Views/Templates/header.php"; ?>

<div class="card">
    <div class="card-header">
        <div class="card-title">Lista de Usuarios</div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nick</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['usuarios'] as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id_usuario']; ?></td>
                        <td><?php echo $usuario['nick']; ?></td>
                        <td><?php echo $usuario['nombre']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>

</html>

<?php require_once "Views/Templates/footer.php"; ?>