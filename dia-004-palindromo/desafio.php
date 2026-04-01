<?php
echo "Digite uma palavra ou frase: ";
$texto = str_replace(" ", "", strtolower(trim(fgets(STDIN))));
$invertido = "";


for ($i = strlen($texto) - 1; $i >= 0; $i--) {
    $invertido .= $texto[$i];
}

if ($texto == $invertido) {
    echo "Resultado: Palíndromo\n";
} else {
    echo "Resultado: Não é um palíndromo\n";
}

?>