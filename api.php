<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test_db";

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recoger y validar datos del formulario
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$correo = $_POST['correo'] ?? '';
$direccion = $_POST['direccion'] ?? '';

// Validación básica
if (empty($nombre) || empty($apellido) || empty($correo) || empty($direccion)) {
    die("Por favor completa todos los campos.");
}

// Usar sentencia preparada para evitar inyección SQL
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, correo, direccion) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $apellido, $correo, $direccion);

// Ejecutar y verificar
if ($stmt->execute()) {
    echo "<script>alert('¡Registro exitoso!'); window.location.href='index.html';</script>";
} else {
    echo "Error al registrar: " . $stmt->error;
}

// Cerrar conexiones
$stmt->close();
$conn->close();
?>
