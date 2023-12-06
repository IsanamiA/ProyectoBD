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

$sql = "SELECT * FROM materias";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Información de Materias</h2>";
    echo "<button onclick=\"location.href='agregarmateria.php'\">Agregar materia</button><br><br>";
    echo "<table border='1'><tr><th>ID</th><th>Nombre</th><th>Nombre Corto</th><th>Clave</th><th>Maestro</th><th>Editar</th><th>Borrar</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['idMateria']}</td>";
        echo "<td>{$row['nombre']}</td>";
        echo "<td>{$row['nombreCorto']}</td>";
        echo "<td>{$row['clave']}</td>";
        echo "<td>{$row['maestro']}</td>";
        echo "<td><a href='editarmateria.php?id={$row['idMateria']}'>Editar</a></td>";
        echo "<td><a href='borrarmateria.php?id={$row['idMateria']}'>Borrar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros en la tabla 'materias'.";
}

$conn->close();
?>
