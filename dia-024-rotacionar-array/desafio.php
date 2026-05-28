<?php
function reverter(&$arr, $inicio, $fim) { // & significa referencia para modificar o array original
    while ($inicio < $fim) {
        $temp = $arr[$inicio];
        $arr[$inicio] = $arr[$fim];
        $arr[$fim] = $temp;
        $inicio++;
        $fim--;
    }
}



function rotacionarDireita($arr, $k) {
    $n = count($arr);
    $k = $k % $n; // evitar rotações desnecessárias

    reverter($arr, 0, $n - $k - 1); // rotaciona os primeiros n-k elementos
    reverter($arr, $n - $k, $n - 1); // inverte os  ultimos k elementos
    reverter($arr, 0, $n - 1); // inverte todo o array

    return $arr;
    
}

$entrada = [1, 2, 3, 4, 5];
$resultado = rotacionarDireita($entrada, 2);
print_r($resultado);
?>