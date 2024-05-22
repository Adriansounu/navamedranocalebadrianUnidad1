<?php
// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    require_once "conexion.php"; // Asegúrate de tener este archivo con la conexión

    // Recoger y validar los datos del formulario
    $name = validar($_POST['name']);
    $apellidos = validar($_POST['apellidos']);
    $email = validar($_POST['email']);
    $password = validar($_POST['password']);
    $copassword = validar($_POST['copassword']);

    // Validar que los campos no estén vacíos
    if (empty($name) || empty($apellidos) || empty($email) || empty($password) || empty($copassword)) {
        echo "Todos los campos son obligatorios";
        exit;
    }

    // Verificar si las contraseñas coinciden
    if ($password != $copassword) {
        echo "Las contraseñas no coinciden";
        exit;
    }

    // Verificar si el correo tiene un formato válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido";
        exit;
    }

    // Verificar si el correo ya está en uso
    $sql_check_email = "SELECT * FROM usuarios WHERE email = ?";
    $stmt_check_email = $pdo->prepare($sql_check_email);
    $stmt_check_email->execute([$email]);
    $existing_user = $stmt_check_email->fetch();

    if ($existing_user) {
        echo "El correo electrónico ya está en uso";
        exit;
    }

    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta SQL para insertar el nuevo registro
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    // Ejecutar la consulta con los datos proporcionados
    if ($stmt->execute([$name, $apellidos, $email, $hashed_password])) {
        // Redirigir al usuario a la página de login
        header("Location: login.html");
        exit; // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error al registrar usuario";
    }
} else {
    echo "Acceso denegado";
}

// Función para limpiar y validar los datos
function validar($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}
?>