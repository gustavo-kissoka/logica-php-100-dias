<?php
function buscaLinear($valores, $busca)
{
    foreach ($valores as $index => $valor) {
        if ($busca == $valor) {
            return $index;
        }
    }
    return -1;
}

function buscaBinaria($valores, $busca) {
    $inicio = 0;
    $fim = count($valores) - 1;

    while ($inicio <= $fim) {
        $meio = floor(($inicio + $fim) / 2);

        // 1ª cenário de busca
        if ($valores[$meio] == $busca) {
            return $meio;
        }

        //2ª cenário
        if ($valores[$meio] > $busca) {
            $fim = $meio - 1;
        }

        //3ª cenário
        else {
            $inicio = $meio + 1;
        }
    }

    
    return -1;
}


$valores = [3, 8, 12, 15, 20];
echo "Busca Linear: ";
echo buscaLinear($valores, 15);

echo "\nBusca Binária: ";
echo buscaBinaria($valores, 15);
