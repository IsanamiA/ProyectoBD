<?php
include('db.php');

$id = $_GET['id'];

$sql = "DELETE FROM materias WHERE idMateria=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro borrado exitosamente";
} else {
    echo "Error al borrar el registro: " . $conn->error;
}

$conn->close();
?>
