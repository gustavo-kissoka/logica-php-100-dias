<?php

require_once __DIR__ . "/../config/database.php";
function adicionarProdutos($pdo, $nome, $quantidade, $preco, $categoria)
{
    // segurança validação
    $nome = trim($nome);
    $categoria = trim($categoria);
    $quantidade = intval($quantidade);
    $preco = floatval($preco);
    // evitar valores negativos ou vazios
    if (empty($nome) || empty($categoria) || $quantidade < 0 || $preco < 0) {
        return false;
    }

    $sql = "INSERT INTO produtos (nome, quantidade, preco, categoria) VALUES (:nome, :quantidade, :preco, :categoria)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':nome' => $nome,
        ':quantidade' => $quantidade,
        ':preco' => $preco,
        ':categoria' => $categoria
    ]);
}

function listarProdutos($pdo, $busca = '')
{

    $busca = trim($busca);

    if (!empty($busca)) {
        $sql = "SELECT * FROM produtos WHERE nome LIKE :busca1 OR categoria LIKE :busca2 ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $termoBusca = '%' . $busca . '%';
        $stmt->execute([
            ':busca1' => $termoBusca,
            ':busca2' => $termoBusca
        ]);
    } else {
        $sql = "SELECT * FROM produtos ORDER BY id DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function editarProduto($pdo, $nome, $quantidade, $preco, $categoria, $id)
{

    $id = intval($id);
    $nome = trim($nome);
    $categoria = trim($categoria);
    $quantidade = intval($quantidade);
    $preco = floatval($preco);

    if ($id <= 0 || empty($nome) || empty($categoria) || $quantidade < 0 || $preco < 0) {
        return false;
    }


    $sql = "UPDATE produtos SET nome = :nome, quantidade = :quantidade, preco = :preco, categoria = :categoria WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':nome' => $nome,
        ':quantidade' => $quantidade,
        ':preco' => $preco,
        ':categoria' => $categoria,
        ':id' => $id
    ]);
}

function removerProduto($pdo, $id)
{

    $id = intval($id);

    if ($id <= 0) {
        return false;
    }

    $sql = "DELETE FROM produtos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        ':id' => $id
    ]);
}

function estatisticaProdutos($pdo)
{
    try {

        $stats = [];
        // total de produtos
        $stmt = $pdo->query("SELECT COUNT(*) FROM produtos");
        $stats['totalProdutos'] = $stmt->fetchColumn();
        // produtos em stock
        $stmt = $pdo->query("SELECT COUNT(*) FROM produtos WHERE quantidade > 0");
        $stats['produtosEmStock'] = $stmt->fetchColumn();

        // produtos em falta
        $stmt = $pdo->query("SELECT COUNT(*) FROM produtos WHERE quantidade = 0");
        $stats['produtosEmFalta'] = $stmt->fetchColumn();

        // valor total do inventario
        $stmt = $pdo->query("SELECT SUM(preco * quantidade) FROM produtos");
        $valorTotal = $stmt->fetchColumn();
        $stats['valorTotal'] = $valorTotal ? floatval($valorTotal) : 0;

        return $stats;
    } catch (PDOException $e) {
        return [
            'totalProdutos' => 0,
            'produtosEmStock' => 0,
            'produtosEmFalta' => 0,
            'valorTotal' => 0
        ];
    }
}
