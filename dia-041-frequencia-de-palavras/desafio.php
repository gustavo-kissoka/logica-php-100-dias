<?php

function contarFrequencia($texto)
{
    $palavras = explode(" ", strtolower($texto));
    $frequencia = [];

    foreach ($palavras as $palavra) {
        if ($palavra != "") {
            $frequencia[$palavra] = isset($frequencia[$palavra]) ? $frequencia[$palavra] + 1 : 1;
        }
    }

    return $frequencia;
}

function palavraMaisFrequente($texto)
{
    $frequencia = contarFrequencia($texto);
    $palavraMaisComum = "";
    $maiorFrequencia = 0;

    foreach ($frequencia as $palavra => $frequenciaPalavra) {
        if ($frequenciaPalavra > $maiorFrequencia) {
            $maiorFrequencia = $frequenciaPalavra;
            $palavraMaisComum = $palavra;
        }
    }

    return "Palavra mais frequente: $palavraMaisComum - Quantidade: $maiorFrequencia";
}

$meuTexto = "php java java php python php java java";
$resultado = contarFrequencia($meuTexto);

foreach ($resultado as $palavra => $frequencia) {
    echo "Palavra: $palavra - Frequência: $frequencia \n";
}
echo "-------------------------------\n";
echo palavraMaisFrequente($meuTexto);

?>