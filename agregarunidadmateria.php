<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUnidad = $_POST['new_unidad'];
    $newMateria = $_POST['new_materia'];

    $sql = "INSERT INTO unidades_materias (unidad, materia) VALUES ('$newUnidad', '$newMateria')";

    if ($conn->query($sql) === TRUE) {
        echo "Unidad de Materia agregada exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'unidadesmaterias.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar la Unidad de Materia: " . $conn->error;
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
    <title>Agregar Unidad de Materia</title>
</head>
<body>
    <h2>Agregar Unidad de Materia</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Unidad: <input type="text" name="new_unidad" required><br>
        Materia: <input type="text" name="new_materia" required><br>
        <input type="submit" value="Agregar Unidad de Materia">
    </form>
</body>
</html>
