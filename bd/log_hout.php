<?php
// Initialiser la session
session_start();

// Détruire toutes les données de session
$_SESSION = array();

// Effacer le cookie de session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion
header("Location: ../index.php");
exit;
?>
