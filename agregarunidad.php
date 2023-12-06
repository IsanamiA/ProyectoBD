<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numeroUnidades = $_POST['numero_unidades'];
    $materia = $_POST['materia'];

    $sql = "INSERT INTO unidades (noUnidades, materia) VALUES ('$numeroUnidades', '$materia')";

    if ($conn->query($sql) === TRUE) {
        echo "Unidad agregada exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'unidades.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar la unidad: " . $conn->error;
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
    <title>Agregar Unidad</title>
</head>
<body>
    <h2>Agregar Unidad</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Número de Unidades: <input type="text" name="numero_unidades" required><br>
        Materia: <input type="text" name="materia"><br>
        <input type="submit" value="Agregar Unidad">
    </form>
</body>
</html>
