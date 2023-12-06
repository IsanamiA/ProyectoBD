<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['new_username'];
    $newStatus = $_POST['new_status'];
    $newProfile = $_POST['new_profile'];

    $sql = "INSERT INTO users (username, status, profile) VALUES ('$newUsername', '$newStatus', '$newProfile')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario agregado exitosamente.";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'mostrarusuarios.php';
                }, 2000);
              </script>";
        exit;
    } else {
        echo "Error al agregar el usuario: " . $conn->error;
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
    <title>Agregar Usuario</title>
</head>
<body>
    <h2>Agregar Usuario</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Usuario: <input type="text" name="new_username" required><br>
        Estado: <input type="text" name="new_status"><br>
        Perfil: <input type="text" name="new_profile"><br>
        <input type="submit" value="Agregar Usuario">
    </form>
</body>
</html>
