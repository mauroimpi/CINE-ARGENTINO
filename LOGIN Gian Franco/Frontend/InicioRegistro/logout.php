<?php
session_start();

// Destruir sesión completamente
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

// Redireccionar con mensaje
header("Location: login.html?logout=exito");
exit;
?>