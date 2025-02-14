<?php
include 'conexiondb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO productos (nombre, precio) VALUES ('$nombre', '$precio')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo producto registrado exitosamente";
        header("Location: inicio.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
