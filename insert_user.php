<?php
$conexion = new mysqli("localhost", "root", "", "mi_base_de_datos");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];

$stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email) VALUES (?, ?)");
$stmt->bind_param("ss", $nombre, $email);

if ($stmt->execute()) {
    echo "Datos guardados correctamente.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>
