<?php
$host = 'localhost';
$dbname = 'foro';
$username = 'root';
$password = '';

try {
    $conexionOttseal = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conexionOttseal->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}

