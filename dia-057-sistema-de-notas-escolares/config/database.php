<?php

function conectarBD() {
    $host = 'localhost';
    $db = 'sistema_escolar';
    $user = 'root';
    $pass = '';

    $dsn = "mysql:host=$host;dbname=$db";

    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        return $pdo;

}catch (PDOException $e) {
        die("Erro de Conexão com a base" . $e->getMessage());
    }
}
?> 