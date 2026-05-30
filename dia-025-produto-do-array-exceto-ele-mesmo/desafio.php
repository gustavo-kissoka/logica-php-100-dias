<?php
function produto_array_exceto_ele_mesmo($nums) {
    $n = count($nums);
    $resultado = array_fill(0, $n, 1); // criar e preparar o array 

    // prefixo a esquerda
    $produtoEsquerda = 1;
    for ($i = 0; $i < $n; $i++) {
        $resultado[$i] = $produtoEsquerda;
        $produtoEsquerda *= $nums[$i];
    }

    // sufixo a direita
    $produtoDireita = 1;
    for ($i = $n - 1; $i >= 0; $i--) {
        $resultado[$i] *= $produtoDireita;
        $produtoDireita *= $nums[$i];
    }

    return $resultado;
    echo "\n";
}

$valores = [1, 2, 3, 4];
$resultado = produto_array_exceto_ele_mesmo($valores);
print_r($resultado);
?>