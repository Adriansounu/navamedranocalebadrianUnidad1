<?php
// Primero, establece la conexión a la base de datos
$dsn = 'mysql:host=localhost; dbname=dwp';
$usuario = 'root';
$contraseña = '';

try {
    $pdo = new PDO($dsn, $usuario, $contraseña);
    // Establece el modo de error de PDO a excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Manejar el error de conexión aquí
    echo 'Error de conexión: ' . $e->getMessage();
    exit;
}