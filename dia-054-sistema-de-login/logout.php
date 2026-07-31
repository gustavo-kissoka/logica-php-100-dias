<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// limpar todas a variaveis da sessão 
$_SESSION = array();

// DESTRUIR O COOKIE DA SESSAO
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy();

// Redireciona o utilizador de volta para a página de login
header('Location: login-register.php');
exit;
?>
