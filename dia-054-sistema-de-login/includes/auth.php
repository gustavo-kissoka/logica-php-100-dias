<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o utilizador está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login-register.php");
    exit;
}