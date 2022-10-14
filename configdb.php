<?php 
    $dsn = 'mysql:dbname=curso_login;host=127.0.0.1';
    $username = 'root';
    $password = '';

    try {
        $conexion = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        echo 'Fallo la conexión: ' . $e->getMessage();
    }


?>