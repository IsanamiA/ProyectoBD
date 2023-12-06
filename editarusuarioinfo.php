<?php
include('db.php');

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newName = $_POST['new_name'];
    $newApellidoP = $_POST['new_apellidoP'];
    $newApellidoM = $_POST['new_apellidoM'];
    $newEdad = $_POST['new_edad'];

    $sql = "UPDATE userinfo SET name='$newName', apellidoP='$newApellidoP', apellidoM='$newApellidoM', edad='$newEdad' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$sql = "SELECT * FROM userinfo WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

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
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>
    <form method="post" action="">
        Nombre: <input type="text" name="new_name" value="<?php echo $row['name']; ?>"><br>
        Apellido Paterno: <input type="text" name="new_apellidoP" value="<?php echo $row['apellidoP']; ?>"><br>
        Apellido Materno: <input type="text" name="new_apellidoM" value="<?php echo $row['apellidoM']; ?>"><br>
        Edad: <input type="text" name="new_edad" value="<?php echo $row['edad']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>

<?php
$conn->close();
?>
