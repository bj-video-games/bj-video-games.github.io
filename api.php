<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cfs";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$correo = $_POST['correo'] ?? '';
$direccion = $_POST['direccion'] ?? '';

if ($nombre && $apellido && $correo && $direccion) {
    $stmt = $conn->prepare("INSERT INTO clientes (nombre, apellido, correo, direccion) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $apellido, $correo, $direccion);

    if ($stmt->execute()) {
        echo "<h2>Registro exitoso</h2>";
        echo '<a href="finalizar.html" style="color:#ffcc00;">Volver al formulario</a>';
    } else {
        echo "<h2>Error: " . $stmt->error . "</h2>";
    }

    $stmt->close();
} else {
    echo "<h2>Faltan datos para registrar</h2>";
}

$conn->close();
?>
