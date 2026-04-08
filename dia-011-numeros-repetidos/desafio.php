<?php
echo "Digite alguns números: ";
$n = explode(" ", trim(fgets(STDIN)));

echo "Repetidos: ";


for ($i = 0; $i < count($n); $i++) {
    for ($j = 0; $j < count($n); $j++) {
        if ($i != $j && $n[$i] == $n[$j]) {
            echo $n[$i] . " ";
        }
    }
}
?>