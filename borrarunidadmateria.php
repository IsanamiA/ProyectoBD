<?php
include('db.php');

$id = $_GET['id'];

$sql = "DELETE FROM unidades_materias WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro borrado exitosamente";
} else {
    echo "Error al borrar el registro: " . $conn->error;
}

$conn->close();
?>
