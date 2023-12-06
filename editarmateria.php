<?php
// Incluye el archivo de conexión a la base de datos
include('db.php');

// Obtén el ID de la materia a editar desde la URL
$id = $_GET['id'];

// Lógica básica de edición (modifica según tus necesidades)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $newNombre = $_POST['new_nombre'];
    $newNombreCorto = $_POST['new_nombre_corto'];
    $newClave = $_POST['new_clave'];
    $newMaestro = $_POST['new_maestro'];

    // Realiza la actualización en la base de datos
    $sql = "UPDATE materias SET nombre='$newNombre', nombreCorto='$newNombreCorto', clave='$newClave', maestro='$newMaestro' WHERE idMateria=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

// Obtén los datos actuales de la materia
$sql = "SELECT * FROM materias WHERE idMateria=$id";
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
    <title>Editar Materia</title>
</head>
<body>
    <h2>Editar Materia</h2>
    <form method="post" action="">
        Nombre: <input type="text" name="new_nombre" value="<?php echo $row['nombre']; ?>"><br>
        Nombre Corto: <input type="text" name="new_nombre_corto" value="<?php echo $row['nombreCorto']; ?>"><br>
        Clave: <input type="text" name="new_clave" value="<?php echo $row['clave']; ?>"><br>
        Maestro: <input type="text" name="new_maestro" value="<?php echo $row['maestro']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>

<?php
$conn->close();
?>
