<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $docente = $_POST['docente'];
    $numeroAlumnos = $_POST['numero_alumnos'];

    $sql = "INSERT INTO grupo (docente, numeroAlumnos) VALUES ('$docente', '$numeroAlumnos')";

    if ($conn->query($sql) === TRUE) {
        echo "Grupo agregado exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'grupos.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar el grupo: " . $conn->error;
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
    <title>Agregar Grupo</title>
</head>
<body>
    <h2>Agregar Grupo</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Docente: <input type="text" name="docente" required><br>
        Número de Alumnos: <input type="text" name="numero_alumnos" required><br>
        <input type="submit" value="Agregar Grupo">
    </form>
</body>
</html>
