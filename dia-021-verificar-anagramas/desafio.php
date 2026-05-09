<?php
// 🧠 O que é um anagrama?
// Duas palavras são anagramas quando:
// possuem as mesmas letras
// com a mesma quantidade
// apenas em ordem diferente

// ❌ Não uses
// sort
// str_split + sort
// funções mágicas

// ESTRUTUTRA MENTAL DO DESAFIO CONTAR A PRIMIERA
// DEPOIS DESCONTAR A SEGUNDA 
// VERIFICAR SE FICOU TUDO ZERO

echo "digite a primeira palavras: ";
$palavra1 = trim(fgets(STDIN));
echo "digite a segunda palavras: ";
$palavra2 = trim(fgets(STDIN));



// $tamanho = strlen($palavra1);
// HASHMAP
$frequencia = [];

for ($i = 0; $i < strlen($palavra1); $i++) {
    if (isset($frequencia[$palavra1[$i]])) {
        $frequencia[$palavra1[$i]]++;
    } else {
        $frequencia[$palavra1[$i]] = 1;
    }
}

for ($i = 0; $i < strlen($palavra2); $i++) {
    if (isset($frequencia[$palavra2[$i]])) {
        $frequencia[$palavra2[$i]]--;
    } else {
        $frequencia[$palavra2[$i]] = -1;
    }
}

foreach ($frequencia as $letra => $f) {
    if ($f != 0) {
        echo "Não é anagrama";
        exit;
    }

}

echo "é anagrama";