<?php
require_once __DIR__ . '../config/database.php';
function adicionarContacto($pdo, $nome, $telefone, $email, $foto)
{
    $sql = "INSERT INTO contactos (nome, telefone, email, foto) VALUES (:nome, :telefone, :email, :foto)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':nome' => $nome,
        ':telefone' => $telefone,
        ':email' => $email,
        ':foto' => $foto
    ]);
}

// Função auxiliar para processar o upload do ficheiro
function processarUploadFoto($file)
{
    if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($extensao, $extensoesPermitidas)) {
            // Gera um nome único para evitar sobreposição
            $novoNome = uniqid('contacto_', true) . '.' . $extensao;
            $diretorioDestino = __DIR__ . '/../uploads/';

            if (!is_dir($diretorioDestino)) {
                mkdir($diretorioDestino, 0755, true);
            }

            $caminhoCompleto = $diretorioDestino . $novoNome;
            if (move_uploaded_file($file['tmp_name'], $caminhoCompleto)) {
                return 'uploads/' . $novoNome;
            }
        }
    }
    return null; // Retorna null caso não haja upload ou falhe
}

function listarContacto($pdo, $busca = '')
{
    if (!empty($busca)) {
        $sql = "SELECT * FROM contactos WHERE nome LIKE :busca OR telefone LIKE :busca OR email LIKE :busca ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':busca' => '%' . $busca . '%']);
    } else {
        $sql = "SELECT * FROM contatos ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function editarContacto($pdo, $nome, $telefone, $email, $foto, $id)
{
    if ($foto !== null) {
        $sql = "UPDATE contactos SET nome = :nome, telefone = :telefone, email = :email, foto = :foto WHERE id = :id";
        $params = [
            ':nome' => $nome,
            ':telefone' => $telefone,
            ':email' => $email,
            ':foto' => $foto,
            ':id' => $id
        ];
    } else {
        $sql = "UPDATE contactos SET nome = :nome, telefone = :telefone, email = :email WHERE id = :id";
        $params = [
            ':nome' => $nome,
            ':telefone' => $telefone,
            ':email' => $email,
            ':id' => $id
        ];
        $stmt = $pdo->prepare($sql);
        return $stmt->execute($params);
    }
}

function removerContacto($pdo, $id)
{
    $sql = "DELETE FROM contactos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':id' => $id
    ]);
}
