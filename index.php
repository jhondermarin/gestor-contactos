<?php

require_once "config/database.php";

$stmt = $pdo->query("SELECT id, nombre, email, telefono, fecha_creacion FROM contactos ");

$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Gestor de contactos</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Fecha de creacion</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($usuarios as $usuario): ?>

                <tr>
                    <td><?= htmlspecialchars((string)$usuario['id']) ?></td>
                    <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td><?= htmlspecialchars($usuario['telefono']) ?></td>
                    <td><?= htmlspecialchars($usuario['fecha_creacion']) ?></td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
        
</body>
</html>