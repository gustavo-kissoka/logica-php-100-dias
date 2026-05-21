<?php

function merge_ordenado($arr1, $arr2)
{
    $ponteido1 = 0;
    $ponteido2 = 0;
    $resultado = [];

    while ($ponteido1 < count($arr1) && $ponteido2 < count($arr2)) {
        if ($arr1[$ponteido1] < $arr2[$ponteido2]) {
            $resultado[] = $arr1[$ponteido1];
            $ponteido1++;
        } else {
            $resultado[] = $arr2[$ponteido2];
            $ponteido2++;
        }
    }

    while ($ponteido1 < count($arr1)) {
        $resultado[] = $arr1[$ponteido1];
        $ponteido1++;
    }
    while ($ponteido2 < count($arr2)) {
        $resultado[] = $arr2[$ponteido2];
        $ponteido2++;
    }

    return $resultado;
}

$Valor1 = [1, 3, 5];
$Valor2 = [2, 4, 6];
$merge = merge_ordenado($Valor1, $Valor2);
print_r($merge);


?>