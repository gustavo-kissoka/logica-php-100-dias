<?php


function rotacionarMatriz90Graus(&$minhaMatriz) {
    $n = count($minhaMatriz);

    // 1ª transposição ou transpor a matriz
    // i: itera pelas linhas (da esquerda para direita)
    // j: itera pelas colunas (da cima para baixo)
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i; $j < $n; $j++) {
            // permuta os valores de [i][j] com [j][i]
            $temp = $minhaMatriz[$i][$j];
            $minhaMatriz[$i][$j] = $minhaMatriz[$j][$i];
            $minhaMatriz[$j][$i] = $temp;
        }
    }   

    // 2ª inverter cada linha
    // i: itera por cada linha
    // reverser():  reverte o array original diretamente
    for($i = 0; $i < $n; $i++) {
        $minhaMatriz[$i] = array_reverse($minhaMatriz[$i]);
    }


}

$minhaMatriz = [
    [1, 2],
    [3, 4]
];

echo "Original: \n";
print_r($minhaMatriz);

rotacionarMatriz90Graus($minhaMatriz);

echo "\nRotacionada: \n";
print_r($minhaMatriz);

?>