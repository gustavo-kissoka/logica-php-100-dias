<?php

function intersecaoComDuplicatas($arr1, $arr2)
{
    $mapaContagem = [];
    $resultado = [];

    foreach ($arr1 as $num) {
        $mapaContagem[$num] = ($mapaContagem[$num] ?? 0) + 1;
    }

    foreach ($arr2 as $num) {
        if ($mapaContagem[$num] > 0) {
            $resultado[] = $num;
            $mapaContagem[$num]--;
        }
    }

    return $resultado;
}

// teste
$array1 = [1, 2, 2, 1, 4];
$array2 = [2, 2, 3, 4];
$resultado = intersecaoComDuplicatas($array1, $array2);
print_r($resultado);
?>