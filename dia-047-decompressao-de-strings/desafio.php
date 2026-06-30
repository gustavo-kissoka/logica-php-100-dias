<?php
function decompressarString($entrada) {
    $resultado = "";

    $total = strlen($entrada);
    // loop avança de 2 em 2 
    for ($i = 0; $i < $total; $i += 2) {

        $caracter = $entrada[$i];

        $quantidade = isset($entrada[$i + 1]) ? intval($entrada[$i + 1]) : 1;
        $resultado .= str_repeat($caracter, $quantidade);
    }

    return  $resultado;
}

// testes 

$entrada = "a3b4c";
var_dump(decompressarString($entrada));


?>