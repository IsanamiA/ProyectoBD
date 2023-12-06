<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $nombreCorto = $_POST['nombre_corto'];
    $clave = $_POST['clave'];
    $maestro = $_POST['maestro'];

    $sql = "INSERT INTO materias (nombre, nombreCorto, clave, maestro) VALUES ('$nombre', '$nombreCorto', '$clave', '$maestro')";

    if ($conn->query($sql) === TRUE) {
        echo "Materia agregada exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'materias.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar la materia: " . $conn->error;
    }
}

$conn->close();
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
    <title>Agregar Materia</title>
</head>
<body>
    <h2>Agregar Materia</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nombre: <input type="text" name="nombre" required><br>
        Nombre Corto: <input type="text" name="nombre_corto"><br>
        Clave: <input type="text" name="clave"><br>
        Maestro: <input type="text" name="maestro"><br>
        <input type="submit" value="Agregar Materia">
    </form>
</body>
</html>
