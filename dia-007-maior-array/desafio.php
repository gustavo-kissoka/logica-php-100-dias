<?php

echo "Digite 5 numeros: ";
$input = trim(fgets(STDIN));

$numeros = array_map('int', array_filter(explode(" ", $input)));

$maior = $numeros[0];
$menor = $numeros[0];

// alternativa max() e o $min()
foreach ($numeros as $num) {
    if ($num > $maior) {
        $maior = $num;
    }

    if ($num < $menor) {
        $menor = $num;
    }
}

echo "Maior número: $maior\n";
echo "Menor número: $menor\n";
?>