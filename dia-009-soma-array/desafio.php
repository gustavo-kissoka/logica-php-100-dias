<?php
// fazer git push
echo "Digite alguns números: ";
$n = explode(" ", trim(fgets(STDIN)));
echo "\n";

// soma 
$soma = 0;
foreach ($n as $num) {
    $soma += $num;
}

echo "Soma: $soma\n";

// MEDIA
$quantidade = count($n);

if ($quantidade > 0) {  
    $media = $soma / $quantidade;
    echo "Média: $media\n";
}
?>