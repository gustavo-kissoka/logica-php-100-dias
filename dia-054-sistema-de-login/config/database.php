<?php
// primeiro cria a conexão com o banco de dados
// altera o nome conforme o teu projecto 
// recomendo usar o xampp para iniciantes
// depois de criares o ficheiro de conexão cria um ficheiro de funções
function conectarBD()
{
    $host = 'localhost'; 
    $db = 'login'; // nome do banco
    $user = 'root';
    $pass = ''; // se for xampp deixa vazio  

    
    $dsn = "mysql:host=$host;dbname=$db";

    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        return $pdo;
    } catch (PDOException $e) {
        die("Erro de Conexão com a base" . $e->getMessage());
    }
}
?>