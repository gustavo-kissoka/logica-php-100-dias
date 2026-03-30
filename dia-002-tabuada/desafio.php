<?php
echo "Número: ";
$num = intval(fgets(STDIN));
echo "Até: ";
$final = intval(fgets(STDIN));
echo "\n";

for ($i = 1; $i <= $final; $i++) {
        $multiplicacao = $num * $i;
        echo "$num x $i = $multiplicacao \n";
}
?>