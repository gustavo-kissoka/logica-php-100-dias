<?php
echo "Número: ";
$num = (int)trim(fgets(STDIN));

if ($num % 2 == 0) {
    echo "Resultado: Par\n";
}else {
    echo "Resultado: Impar\n";
}
// verifica se o valor da entrada é positivo ou negativo
if ($num >= 0) {
    echo "Tipo: Positivo\n";
}elseif ($num < 0) {
    echo "Tipo: Negativo\n";
}else {
    echo "Tipo: Zero\n";
}
?>

