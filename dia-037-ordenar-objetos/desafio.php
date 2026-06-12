<?php
// organização fica para depois. 
$produtos = [
    [
        "nome" => "Mouse",
        "preco" => 5000
    ],
    [
        "nome" => "Monitor",
        "preco" => 80000
    ],
    [
        "nome" => "Teclado",
        "preco" => 12000
    ]
];

// comprando por preco
usort($produtos, function($a, $b) {
    return $a['preco'] <=> $b['preco'];
});
echo "===LISTA DE PRODUTOS DO MAIS BARATO ATÉ MAIS CARO===\n";
foreach ($produtos as $chave => $valor) {
    echo $valor['nome'] . " - " . $valor['preco'] . "\n";
}
echo "----------------------\n"; 


// organizando pelo NOME BONUS

function cmp($a, $b) {
    return strcmp($a['nome'], $b['nome']);
}

usort($produtos, "cmp");
echo "===PRODUTOS POR ORDEM ALFABETICA===\n";
foreach ($produtos as $chave => $valor) {
    echo $valor['nome'] . " - ". $valor['preco'] . "\n";
}



?>