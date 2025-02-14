<?php
include 'conexiondb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nuevo_precio = $_POST['nuevo_precio'];

    $sql = "UPDATE productos SET precio='$nuevo_precio' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Precio actualizado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    // Redirigir de vuelta a la lista de productos
    header("Location: index.php");
    exit();
}
?>
