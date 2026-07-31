<?php
// 
require_once __DIR__ . '/../config/database.php';

function emailExiste($pdo, $email)
{
    $sql = "SELECT id FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);

    // aqui diz se entrou algum registro 
    return $stmt->fetch() !== false;
}

function cadastrarUsuario($pdo, $email, $nome, $senha)
{
    // verificar se o email existe
    if (emailExiste($pdo, $email)) {
        return "Este email já existe.";
    }
    // PARA 'ENCRIPITAR' A SENHA
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // preparar e excutar a inserção dos dados
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $pdo->prepare($sql);

    $sucesso = $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senhaHash
    ]);

    if ($sucesso) {
        return true;
    } else {
        return "ERRO: ao guardar os dados.";
    }
}

function fazerLogin($pdo, $email, $senha)
{

    // procurar pelo email no banco 
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        if (password_verify($senha, $usuario['senha'])) {
            // garantir que a sessão esta ativa e guardar os dados
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            return true;
        }
    }
    
    return false;
}
