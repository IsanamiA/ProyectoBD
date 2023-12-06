<?php
$servername = "localhost";
$username = "isa";
$password = "150503";
$dbname = "escuela2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function exportDatabase($conn, $dbName) {
    $backup_file = 'backup_' . $dbName . '_' . date("Y-m-d-H-i-s") . '.sql';
    
    $tables = array();
    $result = $conn->query("SHOW TABLES");
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }

    $handle = fopen($backup_file, 'w');
    foreach ($tables as $table) {
        $result = $conn->query("SELECT * FROM $table");
        while ($row = $result->fetch_assoc()) {
            $insert_query = "INSERT INTO $table VALUES (";
            foreach ($row as $value) {
                $insert_query .= "'" . $conn->real_escape_string($value) . "',";
            }
            $insert_query = rtrim($insert_query, ',') . ");\n";
            fwrite($handle, $insert_query);
        }
    }
    fclose($handle);

    if (file_exists($backup_file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($backup_file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($backup_file));
        ob_clean();
        flush();
        readfile($backup_file);
        unlink($backup_file);
        exit;
    } else {
        echo "Error al crear el archivo de respaldo.";
    }
}

if (isset($_POST['export'])) {
    exportDatabase($conn, $dbname);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<style>
        body {
            font-family: "Century Gothic";
            background-color: #F1F0E9;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        form {
            margin: 400px auto;
        }

        button {
            background-color: #F5E188;
            color: black;
            padding: 20px 50px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: "Century Gothic";

        }

        button:hover {
            background-color: #F5CB0D;
            color: white;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exportar Base de Datos</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="export">Exportar Base de Datos</button>
    </form>
</body>
</html>
