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
// Incluye el archivo de conexión a la base de datos
include('db.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM alumnos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Información de Alumnos</h2>";
    echo "<button onclick=\"location.href='agregaralumno.php'\">Agregar nuevo alumno</button><br><br>";
    echo "<table border='1'><tr><th>ID</th><th>Número de Control</th><th>Calle</th><th>Colonia</th><th>Número</th><th>Municipio</th><th>Ciudad</th><th>Estado</th><th>Acciones</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['numeroControl']}</td>";
        echo "<td>{$row['calle']}</td>";
        echo "<td>{$row['colonia']}</td>";
        echo "<td>{$row['numero']}</td>";
        echo "<td>{$row['municipio']}</td>";
        echo "<td>{$row['ciudad']}</td>";
        echo "<td>{$row['estado']}</td>";
        echo "<td>
                <a href='editarAlumno.php?id={$row['id']}'>Editar</a> | 
                <a href='borrarAlumno.php?id={$row['id']}'>Borrar</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros en la tabla 'alumnos'.";
}

$conn->close();
?>
