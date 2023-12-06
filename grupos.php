<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Perfiles</title>
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

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #333;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #F5E188 ;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #F5E188 ;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #F5CB0D ;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
<?php
include('db.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function borrarGrupo($conn, $id) {
    $sql = "DELETE FROM grupo WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro borrado exitosamente";
    } else {
        echo "Error al borrar el registro: " . $conn->error;
    }
}

if (isset($_GET['borrar_id'])) {
    $borrar_id = $_GET['borrar_id'];
    borrarGrupo($conn, $borrar_id);
}

$sql = "SELECT * FROM grupo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Información de Grupos</h2>";
    echo "<button onclick=\"location.href='agregargrupo.php'\">Agregar nuevo grupo</button><br><br>";
    echo "<table border='1'><tr><th>ID</th><th>Docente</th><th>Número de Alumnos</th><th>Editar</th><th>Borrar</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['docente']}</td>";
        echo "<td>{$row['numeroAlumnos']}</td>";
        echo "<td><a href='editar_grupo.php?id={$row['id']}'>Editar</a></td>";
        echo "<td><a href='grupos.php?borrar_id={$row['id']}'>Borrar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros en la tabla 'grupo'.";
}

$conn->close();
?>
