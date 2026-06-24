<?php
function primeiroCaracterUnico($string) {
    $caracteres = str_split($string);
    $contagem = [];

    // passo 1 - contar quantas vezes cada caractere aparece
    foreach ($caracteres as $index) {
        $contagem[$index] = isset($contagem[$index]) ? $contagem[$index] + 1 : 1;
    }
    
    // passo 2 - encontrar a primeiro caractere 
    for ($i = 0; $i < count($caracteres); $i++) {
        if ($contagem[$caracteres[$i]] == 1) {
            return $caracteres[$i]; // retorna o primeiro caractere
        }

    }

    return ""; 
}

$string = '';
echo "O único caractere é: ";
echo primeiroCaracterUnico($string);
?>