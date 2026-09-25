<?php
require_once __DIR__ . '/../config/database.php';

date_default_timezone_set('Europe/Lisbon');

function listarComentarios($pdo, $busca = '')
{
    $busca = trim($busca);

    if (!empty($busca)) {
        $sql = "SELECT * FROM comentarios WHERE nome LIKE :busca1 OR comentario LIKE :busca2 ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $termoBusca = '%' . $busca . '%';
        $stmt->execute([
            ':busca1' => $termoBusca,
            ':busca2' => $termoBusca
        ]);
    } else {
        $sql = "SELECT * FROM comentarios ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function adicionarComentarios($pdo, $nome, $comentario)
{
    $nome = trim($nome);
    $comentario = trim($comentario);

    if (empty($nome) || empty($comentario)) {
        return false;
    }

    $sql = "INSERT INTO comentarios (nome, comentario) VALUES (:nome, :comentario)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':nome' => $nome,
        ':comentario' => $comentario
    ]);
}

function editarComentario($pdo, $id, $comentario)
{

    $id = intval($id);
    $comentario = trim($comentario);

    if ($id <= 0 || empty($comentario)) {
        return false;
    }

    $sql = "UPDATE comentarios SET comentario = :comentario WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':comentario' => $comentario,
        ':id' => $id
    ]);
}

// funções auxiliares
// função para formatar o tempo ex.: 3 minutos atrás
function tempo($data)
{
    $timestamp = strtotime($data);

    $diferenca = time() - $timestamp;

    if ($diferenca < 60) {
        return 'Agora';
    }

    $intervalos = [
        31536000 => 'ano',
        2592000 => 'mês',
        604800 => 'semana',
        86400 => 'dia',
        3600 => 'hora',
        60 => 'minuto'
    ];

    foreach ($intervalos as $segundos => $unidade) {
        $divisao = $diferenca / $segundos;

        if ($divisao >= 1) {
            $valor = floor($divisao);

            if ($valor > 1) {
                $unidade = ($unidade === 'mês') ? 'meses' : $unidade . 's';
            }

            return "Há " . $valor . " " . $unidade;
        }
    }

    return "Agora mesmo";
}

function obterInicialNome($nome)
{
    $nome = trim($nome);

    if (empty($nome)) {
        return '?';
    }

    // Pega a primeira letra
    $inicial = mb_substr($nome, 0, 1, 'UTF-8');

    // Converte para maiúscula
    return mb_strtoupper($inicial, 'UTF-8');
}
