<?php

echo "Digite alguns números: ";
$numeros = explode(" ", trim(fgets(STDIN)));

echo "Alvo: ";
$target = trim(fgets(STDIN));

$mapa = [];

foreach ($numeros as $i => $num) {

    $completo = $target - $num;

    if (isset($mapa[$completo])) {
        echo "Índices: ".$mapa[$completo] . " e " . "$i";
        break;
    }
     $mapa[$num] = $i;
}

?>