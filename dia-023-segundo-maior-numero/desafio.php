<?php

function contador_segundo_maior($numeros)
{
    $maior = PHP_INT_MIN;
    $segundo_maior = PHP_INT_MIN;

    foreach ($numeros as $num) {
        if ($num > $maior) {
            $segundo_maior = $maior;
            $maior = $num;
        }elseif ($num > $segundo_maior && $num != $maior) {
            $segundo_maior = $num;
        }
    }
    return $segundo_maior;
}

$valores = [10, 5, 8, 20, 15];
$resultado = contador_segundo_maior($valores);
echo $resultado;

?>