<?php
echo "Número: ";
$num = (int)trim(fgets(STDIN));
$divisores = 0;

echo "Divisores: ";
for ($i = 1; $i <= $num; $i++) {
    if ($num % $i == 0) {
        $divisores++;
      echo $i . " ";
    }
}
echo "\n";

if ($divisores == 2) {
    echo "Resultado: Primo\n";
}else {
    echo "Resultado: Não primo\n";
}

?>