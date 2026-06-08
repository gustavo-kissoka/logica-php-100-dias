<?php
function calcularMedia($notas)
{
    if (empty($notas)) {
        return 0;
    }
    $media = array_sum($notas) / count($notas);
    return $media;
}

function verificarSituacao($media)
{

    if ($media >= 10) {
        return "Aprovado";
    } elseif ($media >= 8 && $media < 10) {
        return "Recuperação";
    } elseif ($media < 8) {
        return "Reprovado";
    }
}

$notas = [14, 12, 16];
// $maior = max($notas);
// $menor = min($notas);

$maior = $notas[0];
$menor = $notas[0];

foreach ($notas as $nota) {
    if ($nota > $maior) {
        $maior = $nota;
    }
    if ($nota < $menor) {
        $menor = $nota;
    }
}

echo "Maior nota: $maior\n";
echo "Menor nota: $menor\n";
$media = calcularMedia($notas);
echo "Média: $media\n";
echo "Situação: " . verificarSituacao($media) . "\n";
?>