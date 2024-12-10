<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'formulario';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registro exitoso.'); window.location.href='index.html';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
