<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $calificacion1 = $_POST['calificacion1'];
    $calificacion2 = $_POST['calificacion2'];
    $calificacion3 = $_POST['calificacion3'];
    $calificacion4 = $_POST['calificacion4'];
    $calificacion5 = $_POST['calificacion5'];
    $calificacion6 = $_POST['calificacion6'];
    $estudiante = $_POST['estudiante'];

    // Calcula el promedio
    $promedio = ($calificacion1 + $calificacion2 + $calificacion3 + $calificacion4 + $calificacion5 + $calificacion6) / 6;

    $sql_insert = "INSERT INTO calificaciones (calificacion1, calificacion2, calificacion3, calificacion4, calificacion5, calificacion6, promedio, estudiante) 
                   VALUES ($calificacion1, $calificacion2, $calificacion3, $calificacion4, $calificacion5, $calificacion6, $promedio, '$estudiante')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Calificación agregada exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'calificaciones.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar la calificación: " . $conn->error;
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
    <title>Agregar Calificación</title>
</head>
<body>
    <h2>Agregar Calificación</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Calificación 1: <input type="number" name="calificacion1" required><br>
        Calificación 2: <input type="number" name="calificacion2" required><br>
        Calificación 3: <input type="number" name="calificacion3" required><br>
        Calificación 4: <input type="number" name="calificacion4" required><br>
        Calificación 5: <input type="number" name="calificacion5" required><br>
        Calificación 6: <input type="number" name="calificacion6" required><br>
        Estudiante: <input type="text" name="estudiante" required><br>
        <input type="submit" value="Agregar Calificación">
    </form>
</body>
</html>
