<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <h1>Lista de usuarios</h1>

    <table>
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
</body>
</html>