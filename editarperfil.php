<?php
include('db.php');

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newProfile = $_POST['new_profile'];
    $newDescription = $_POST['new_description'];
    $newStatus = $_POST['new_status'];

    $sql = "UPDATE profiles SET profile='$newProfile', description='$newDescription', status='$newStatus' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$sql = "SELECT * FROM profiles WHERE id=$id";
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
    <title>Editar Perfil</title>
</head>
<body>
    <h2>Editar Perfil</h2>
    <form method="post" action="">
        Perfil: <input type="text" name="new_profile" value="<?php echo $row['profile']; ?>"><br>
        Descripción: <input type="text" name="new_description" value="<?php echo $row['description']; ?>"><br>
        Estado: <input type="text" name="new_status" value="<?php echo $row['status']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>

<?php
$conn->close();
?>
