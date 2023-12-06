<?php
$servername = "localhost";
$username = "isa";
$password = "150503";
$dbname = "escuela2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
