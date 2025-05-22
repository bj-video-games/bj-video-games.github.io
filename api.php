<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "test_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

$sql = "INSERT INTO usuarios (nombre, apellido, correo, direccion) 
        VALUES ('$nombre', '$apellido', '$correo', '$direccion')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
