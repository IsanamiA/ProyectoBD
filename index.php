<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación Escuela</title>
    <style>
        body {
            font-family: "Century Gothic";
            background-color: #F1F0E9;
        }

        h1 {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        li {
            display: inline-block;
            margin: 0 10px;
            width: 30%; /* Ajusta el ancho para dos columnas */
            box-sizing: border-box;
            margin-bottom: 20px;
            text-align: center;
        }

        a {
            text-decoration: none;
            display: block;
            padding: 10px;
            background-color: #F5D43D;
            color: black;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 22px;
        }

        a:hover {
            background-color: #C1A112;
            color: white;
        }

        img {
            max-width: 25%; 
            height: auto;
            display: block;
            margin: 0 auto; 
            margin-top: 10px; 
        }
    </style>
</head>
<body>
    <h1>Bienvenido a la Aplicación de la Escuela</h1>
    <ul>
        <li>
            <a href="mostrarPerfiles.php">
                Mostrar Perfiles
                <img src="img/perfiles.png">
            </a>
        </li>
        <li>
            <a href="mostrarUsuarios.php">
                Mostrar Usuarios
                <img src="img/usuarios.png">
            </a>
        </li>
        <li>
            <a href="usuarioInformacion.php">
                Información de usuarios
                <img src="img/infoU.png">
            </a>
        </li>
        <li>
            <a href="maestros.php">
                Maestros
                <img src="img/maestro.png">
            </a>
        </li>
        <li>
            <a href="grupos.php">
                Grupos
                <img src="img/grupos.png">
            </a>
        </li>
        <li>
            <a href="alumnos.php">
                Alumnos
                <img src="img/alumno.png">
            </a>
        </li>
        <li>
            <a href="materias.php">
                Materias
                <img src="img/materias.png">
            </a>
        </li>
        <li>
            <a href="unidades.php">
                Unidades
                <img src="img/unidades.png">
            </a>
        </li>
        <li>
            <a href="unidadesMaterias.php">
                Unidades por materia
                <img src="img/uniM.png">
            </a>
        </li>
        <li>
            <a href="calificaciones.php">
                Calificaciones
                <img src="img/cali.png">
            </a>
        </li>
        <li>
            <a href="exportar_bd.php">
                Exportar la base de datos
                <img src="img/bd.png">
            </a>
        </li>
    </ul>
</body>
</html>
