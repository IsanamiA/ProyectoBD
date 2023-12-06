<?php
include('db.php');

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newNumeroControl = $_POST['new_numero_control'];
    $newCalle = $_POST['new_calle'];
    $newColonia = $_POST['new_colonia'];
    $newNumero = $_POST['new_numero'];
    $newMunicipio = $_POST['new_municipio'];
    $newCiudad = $_POST['new_ciudad'];
    $newEstado = $_POST['new_estado'];

    $sql = "UPDATE alumnos SET numeroControl='$newNumeroControl', calle='$newCalle', colonia='$newColonia', numero='$newNumero', municipio='$newMunicipio', ciudad='$newCiudad', estado='$newEstado' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$sql = "SELECT * FROM alumnos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Formulario de edición
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
    <title>Editar Alumno</title>
</head>
<body>
    <h2>Editar Alumno</h2>
    <form method="post" action="">
        Número de Control: <input type="text" name="new_numero_control" value="<?php echo $row['numeroControl']; ?>"><br>
        Calle: <input type="text" name="new_calle" value="<?php echo $row['calle']; ?>"><br>
        Colonia: <input type="text" name="new_colonia" value="<?php echo $row['colonia']; ?>"><br>
        Número: <input type="text" name="new_numero" value="<?php echo $row['numero']; ?>"><br>
        Municipio: <input type="text" name="new_municipio" value="<?php echo $row['municipio']; ?>"><br>
        Ciudad: <input type="text" name="new_ciudad" value="<?php echo $row['ciudad']; ?>"><br>
        Estado: <input type="text" name="new_estado" value="<?php echo $row['estado']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>

<?php
$conn->close();
?>
