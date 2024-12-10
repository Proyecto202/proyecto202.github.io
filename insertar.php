<?php
// Verifica si se ha hecho una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $comentarios = $_POST['comentarios'];
    $fecha = $_POST['fecha'];

    // Preparar y ejecutar la consulta
    $sql = "INSERT INTO quejas_sugerencias (nombre, telefono, correo, comentarios, fecha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $telefono, $correo, $comentarios, $fecha);

    if ($stmt->execute()) {
        echo "Registro insertado con éxito.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Método no permitido.";
}
?>
