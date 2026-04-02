<?php
echo "Digite um número: ";
$num = (int)trim(fgets(STDIN));
$resultado = 1;

if ($num == 0) {
    echo "Cálculo: 1\n";
    echo "Fatorial: 1\n";
    exit;
    }

echo "Cálculo: ";
for ($i = $num; $i >= 1; $i--) {
    $resultado *= $i;
    echo "$i";
    if ($i > 1) {
        echo " x ";
        
    } 
     
}

echo "\n";    
echo "Fatorial: $resultado\n";
?>