<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "cfs";

// Conexión
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

// Insertar en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellido, correo, direccion) 
        VALUES ('$nombre', '$apellido', '$correo', '$direccion')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
