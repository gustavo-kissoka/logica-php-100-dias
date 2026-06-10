<?php

$carrinho = [];

function adicionarProduto(&$carrinho, $nome, $preco)
{

    $novoProduto = [
        'nome' => $nome,
        'preco' => $preco
    ];

    $carrinho[] = $novoProduto;
    echo "Produto adicionado com sucesso \n";
    echo "----------------------\n";    
}

function listarProdutos ($carrinho) {
    echo "Lista de itens: \n";

    if (empty($carrinho)) {
        echo "Carrinho vazio\n";
        return;
    }

    foreach ($carrinho as $produto) {
        echo $produto['nome'] . " - " . $produto['preco'] . "\n";
    }
    echo "----------------------\n";
}

function calcularTotal ($carrinho) {
    $total = 0;
    foreach ($carrinho as $produto) {
        $total += $produto['preco'];
    }
    return $total;
}

adicionarProduto($carrinho, "Mouse", 5000);
adicionarProduto($carrinho, "Teclado", 12000);
adicionarProduto($carrinho, "Monitor", 80000);


listarProdutos($carrinho);


echo "Total: ";
echo calcularTotal($carrinho);
?>