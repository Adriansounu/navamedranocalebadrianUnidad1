<?php
//Cierra la sesión del ususario y redirecciona al index//
session_start();
session_destroy();
header("Location: index.html");
exit();
?>
