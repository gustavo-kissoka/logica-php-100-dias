<?php
function longestCommonPrefix($strs) {
    // verificar se o array esta vazio
    if (empty($strs)) {
        return "";
    }  

    $prefix = $strs[0];

    for ($i = 1; $i < count($strs); $i++) {
        while (strpos($strs[$i], $prefix) !== 0) {
            $prefix = substr($prefix, 0, -1);

            if (empty($prefix)) {
                return "";
            }
        }
    }

    return $prefix;
}
$array = ["dog","racecar","car"];
$resultado = longestCommonPrefix($array);
print_r($resultado);
?>