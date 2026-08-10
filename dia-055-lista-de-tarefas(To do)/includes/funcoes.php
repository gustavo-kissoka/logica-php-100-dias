<?php
require_once __DIR__ . '/../config/database.php';

function adicionarTarefa($pdo, $titulo, $descricao) {
    $sql = "INSERT INTO  tarefas (titulo, descricao) VALUES (:titulo, :descricao)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':titulo' => $titulo,
        ':descricao' => $descricao
    ]);
}

function listarTarefas($pdo) {
    $sql = "SELECT * FROM tarefas ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarLivrosPorId($pdo, $id) {
    $sql = "SELECT * FROM tarefas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function editarTarefa($pdo, $titulo, $descricao, $id) {
    $sql = "UPDATE tarefas SET titulo = :titulo, descricao = :descricao WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':titulo' => $titulo,
        ':descricao' => $descricao,
        ':id' => $id
    ]);
}

function concluirTarefa($pdo, $id) {
    $sql = "UPDATE tarefas SET status = 'concluida' WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([':id' => $id]);
}

function removerTarefa($pdo, $id) {
    $sql = "DELETE FROM tarefas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([':id' => $id]);
}
?>