<?php
include('db.php');

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newCalificacion1 = $_POST['new_calificacion1'];
    $newCalificacion2 = $_POST['new_calificacion2'];
    $newCalificacion3 = $_POST['new_calificacion3'];
    $newCalificacion4 = $_POST['new_calificacion4'];
    $newCalificacion5 = $_POST['new_calificacion5'];
    $newCalificacion6 = $_POST['new_calificacion6'];
    $newPromedio = $_POST['new_promedio'];
    $newEstudiante = $_POST['new_estudiante'];

    $sql = "UPDATE calificaciones SET calificacion1='$newCalificacion1', calificacion2='$newCalificacion2', calificacion3='$newCalificacion3', calificacion4='$newCalificacion4', calificacion5='$newCalificacion5', calificacion6='$newCalificacion6', promedio='$newPromedio', estudiante='$newEstudiante' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$sql = "SELECT * FROM calificaciones WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
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
    <title>Editar Calificación</title>
</head>
<body>
    <h2>Editar Calificación</h2>
    <form method="post" action="">
        Calificación 1: <input type="text" name="new_calificacion1" value="<?php echo $row['calificacion1']; ?>"><br>
        Calificación 2: <input type="text" name="new_calificacion2" value="<?php echo $row['calificacion2']; ?>"><br>
        Calificación 3: <input type="text" name="new_calificacion3" value="<?php echo $row['calificacion3']; ?>"><br>
        Calificación 4: <input type="text" name="new_calificacion4" value="<?php echo $row['calificacion4']; ?>"><br>
        Calificación 5: <input type="text" name="new_calificacion5" value="<?php echo $row['calificacion5']; ?>"><br>
        Calificación 6: <input type="text" name="new_calificacion6" value="<?php echo $row['calificacion6']; ?>"><br>
        Promedio: <input type="text" name="new_promedio" value="<?php echo $row['promedio']; ?>"><br>
        Estudiante: <input type="text" name="new_estudiante" value="<?php echo $row['estudiante']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>

<?php
$conn->close();
?>
