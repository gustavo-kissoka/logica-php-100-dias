<?php


function maxSubstring($texto)
{
    $tamanho = strlen($texto);
    $janela = [];
    $maior = 0;

    for ($i = 0; $i < $tamanho; $i++) {
        while (in_array($texto[$i], $janela)) {
            array_shift($janela);
        }
        $janela[] = $texto[$i];
        $maior = max($maior, count($janela));
    }
    return $maior;
}

$texto = "bbbbb";
echo maxSubstring($texto);
?>