<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroControl = $_POST['numeroControl'];
    $calle = $_POST['calle'];
    $colonia = $_POST['colonia'];
    $numero = $_POST['numero'];
    $municipio = $_POST['municipio'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO alumnos (numeroControl, calle, colonia, numero, municipio, ciudad, estado) 
            VALUES ('$numeroControl', '$calle', '$colonia', '$numero', '$municipio', '$ciudad', '$estado')";

    if ($conn->query($sql) === TRUE) {
        echo "Alumno agregado exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'alumnos.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar el alumno: " . $conn->error;
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
    <title>Agregar Alumno</title>
</head>

<body>
    <h2>Agregar Alumno</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Número de Control:</label>
        <input type="number" name="numeroControl" required>

        <label>Calle:</label>
        <input type="text" name="calle" required>

        <label>Colonia:</label>
        <input type="text" name="colonia" required>

        <label>Número:</label>
        <input type="number" name="numero" required>

        <label>Municipio:</label>
        <input type="text" name="municipio" required>

        <label>Ciudad:</label>
        <input type="text" name="ciudad" required>

        <label>Estado:</label>
        <input type="text" name="estado" required>

        <input type="submit" value="Agregar Alumno">
    </form>
</body>

</html>
