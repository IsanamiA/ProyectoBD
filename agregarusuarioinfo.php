<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $edad = $_POST['edad'];

    $sql = "INSERT INTO userinfo (name, apellidoP, apellidoM, edad) 
            VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', $edad)";

    if ($conn->query($sql) === TRUE) {
        echo "Información de Usuario agregada exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'usuarioinformacion.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar la información de usuario: " . $conn->error;
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
    <title>Agregar Información De Usuario</title>
</head>
<body>
    <h2>Agregar Información De Usuario</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nombre: <input type="text" name="nombre" required><br>
        Apellido Paterno: <input type="text" name="apellidoPaterno" required><br>
        Apellido Materno: <input type="text" name="apellidoMaterno" required><br>
        Edad: <input type="text" name="edad" required><br>
        <input type="submit" value="Agregar Información De Usuario">
    </form>
</body>
</html>
