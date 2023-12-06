<?php
include('db.php');

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $newUnidad = $_POST['new_unidad'];
    $newMateria = $_POST['new_materia'];

    $sql = "UPDATE unidades_materias SET unidad='$newUnidad', materia='$newMateria' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$sql = "SELECT * FROM unidades_materias WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: "Century Gothic";
            background-color: #F1F0E9;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
            font-size: 35px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            text-align: center; 
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 30px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #F5E188;
            font-family: "Century Gothic";
            color: black;
        }

        input[type="submit"]:hover {
            background-color: #F5CB0D;
            color: white;
        }
    </style>
<head>
    <title>Editar Unidad/Materia</title>
</head>
<body>
    <h2>Editar Unidad/Materia</h2>
    <form method="post" action="">
        Unidad: <input type="text" name="new_unidad" value="<?php echo $row['unidad']; ?>"><br>
        Materia: <input type="text" name="new_materia" value="<?php echo $row['materia']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>

<?php
$conn->close();
?>
