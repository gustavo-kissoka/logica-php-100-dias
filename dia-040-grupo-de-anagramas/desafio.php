<?php

function agruparAnagramas($palavras) {
    $frequencia = [];

    foreach ($palavras as $palavra) {
        $letras = str_split($palavra);
        sort($letras);
        $chave = implode('', $letras);

        // se a chave não existir no array de frequência, inicializa com um array vazio
        if (isset($frequencia[$chave])) {
            $frequencia[$chave][] = $palavra;
        }else {
            $frequencia[$chave] = [$palavra];
        }
    }

    return array_values($frequencia);

}



$palavras =  ["amor", "roma", "carro", "arom", "carro"];
print_r(agruparAnagramas($palavras));
?>