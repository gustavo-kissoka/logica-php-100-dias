<?php
$jogadores = [
    [
        "nome" => "Gustavo",
        "pontos" => 300
    ],
    [
        "nome" => "Maria",
        "pontos" => 250
    ],
    [
        "nome" => "Joaquim",
        "pontos" => 100
    ],
    [
        "nome" => "Pedro",
        "pontos" => 150
    ],
    [
        "nome" => "Antonio",
        "pontos" => 200
    ]
];

function ordenarJogadores(&$jogadores)
{
    usort($jogadores, function ($a, $b) {
        return $b['pontos'] <=> $a['pontos'];
    });
    return $jogadores;
}

echo "===RANKING===\n";
function Top3($jogadores)
{
    $posicao = 0;
    $top3 = array_slice($jogadores, 0, 3);
    foreach ($top3 as $jogador) {
        $posicao++;
        echo $posicao . "ª " . $jogador['nome'] . " - " . $jogador['pontos'] . " pontos" . "\n";
    }
}

function restantes($jogadores)
{
    $posicao = 3;
    $restantes = array_slice($jogadores, 3);
    foreach ($restantes as $jogador) {
        $posicao++;
        echo $posicao . "ª " . $jogador['nome'] . " - " . $jogador['pontos'] . " pontos" . "\n";
    }
}

$ordenarJogadores = ordenarJogadores($jogadores);

top3($ordenarJogadores);
echo "----------------------\n";
restantes($ordenarJogadores);
?>