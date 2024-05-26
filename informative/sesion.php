<?php
session_start();

// Verificar si $_SESSION['nombre'] está definida
if(isset($_SESSION['nombre'])) {
    // Acceder a $_SESSION['nombre']
    $nombre = $_SESSION['nombre'];
    echo "Hola, $nombre";
} else {
    echo "La variable de sesión 'nombre' no está definida.";
}
?>