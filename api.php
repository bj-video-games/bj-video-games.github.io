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
        echo "Registro exitoso";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Faltan datos para registrar";
}

$conn->close();
?>
