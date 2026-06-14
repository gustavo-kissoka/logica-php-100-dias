<?php

function temDuplicatas($array) {
    $mapa = [];


    foreach ($array as $num) {
        if (isset($mapa[$num])) {
            return true;
        }
        // adicionar no mapa 
        $mapa[$num] = true;
    }
    return false; // se não houver duplicatas
}

$array = [10, 20, 30, 40, 10];
var_dump(temDuplicatas($array));
?>