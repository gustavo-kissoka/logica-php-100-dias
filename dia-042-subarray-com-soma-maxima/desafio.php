<?php
function maxSubArray($nums)
{
    $somaAtual = $nums[0];
    $somaMax = $nums[0];

    for ($i = 1; $i < count($nums); $i++) {
        // decide se começa um novo subarray ou se  soma o elemento atual ao subarray anterior 
        $somaAtual = max($nums[$i], $somaAtual + $nums[$i]);
        // atualiza a soma maxima global se a atual for maior
        $somaMax = max($somaMax, $somaAtual);
    }

    return $somaMax;
}

$nums = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo maxSubArray($nums);
?>