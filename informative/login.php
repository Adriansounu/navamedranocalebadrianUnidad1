<?php
session_start();

// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    require_once "conexion.php"; // Asegúrate de tener este archivo con la conexión

    // Recoger y validar los datos del formulario
    $email = validar($_POST['email']);
    $password = validar($_POST['password']);

    // Validar que los campos no estén vacíos
    if (empty($email) || empty($password)) {
        echo "Todos los campos son obligatorios";
        exit;
    }

    // Buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verificar si se encontró un usuario y si la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        // Iniciar sesión y asignar variables de sesión
        $_SESSION['usuario'] = $user;
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['apellidos'] = $user['apellidos'];

        // Redirigir al usuario a una página de inicio
        header("Location: user.php");
        exit;
    } else {
        echo "Correo electrónico o contraseña incorrectos";
    }
}

// Función para limpiar y validar los datos
function validar($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}
?>