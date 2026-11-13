<?php

require_once "config/database.php";

$errores = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');


    if ($nombre === '' ) {
        $errores[] = "El nombre es obligatorio";
    }

    if ($email === '') {
        $errores[] = "El email es obligatorio";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no tiene un formato valido";
    }

    if (empty($errores)) {
        $stmt = $pdo->prepare('INSERT INTO contactos (nombre, email, telefono) VALUES (:nombre, :email, :telefono)');

        $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':telefono' => $telefono,
        ]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="crear.php" method="post">
        <label for="nombre">Nombre de usuario:</label><br>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br><br>

        <label for="telefono">Telefono:</label><br>
        <input type="tel" id="telefono" name="telefono">

        <input type="submit" value="Enviar datos">

    </form>
        
    <?php foreach ($errores as $error): ?>

        <!-- PARA MOSTRAR ERRORES CON CODIFICACION EXPLICITA -->
        <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>

    <?php endforeach; ?>

</body>
</html>