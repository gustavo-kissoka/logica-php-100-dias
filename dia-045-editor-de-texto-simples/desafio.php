<?php

echo " 
█████ ████  ███ █████  ███  ████     ████  █████    █████ █████ █   █ █████  ███      ████ ███ █   █ ████  █     █████  ████ 
█     █   █  █    █   █   █ █   █    █   █ █          █   █      █ █    █   █   █    █      █  ██ ██ █   █ █     █     █     
████  █   █  █    █   █   █ ████     █   █ ████       █   ████    █     █   █   █     ███   █  █ █ █ ████  █     ████   ███  
█     █   █  █    █   █   █ █  █     █   █ █          █   █      █ █    █   █   █        █  █  █   █ █     █     █         █ 
█████ ████  ███   █    ███  █   █    ████  █████      █   █████ █   █   █    ███     ████  ███ █   █ █     █████ █████ ████  
\n";



function adicionarTexto($novoTexto, &$pilhaUndo, &$pilhaRedo, &$textoAtual)
{
    array_push($pilhaUndo, $textoAtual);
    $pilhaRedo = [];
    $textoAtual .= $novoTexto;
}

function desfazer(&$pilhaUndo, &$pilhaRedo, &$textoAtual)
{
    if (count($pilhaUndo) > 0) {
        $pilhaRedo[] = $textoAtual;
        $textoAtual = array_pop($pilhaUndo);
    } else {
        echo "Nada para desfazer\n";
    }
}

function refazer(&$pilhaRedo, &$pilhaUndo, &$textoAtual)
{
    if (count($pilhaRedo) > 0) {
        $pilhaUndo[] = $textoAtual;
        $textoAtual = array_pop($pilhaRedo);
    } else {
        echo "Nada para refazer\n";
    }
}

function apagarTexto($quantidade, &$pilhaUndo, &$pilhaRedo, &$textoAtual) {

    if ($quantidade >= strlen($textoAtual)) {
        $textoAtual = "";
        return;
    }

    $pilhaUndo[] = $textoAtual;
    $pilhaRedo = [];
    $textoAtual = substr($textoAtual, 0, strlen($textoAtual) - $quantidade);
}
$pilhaUndo = [];
$pilhaRedo = [];
$textoAtual = "";


// testes
adicionarTexto("Olá ", $pilhaUndo, $pilhaRedo, $textoAtual);
adicionarTexto("Mundo", $pilhaUndo, $pilhaRedo, $textoAtual);
// texto total: Olá Mundo
echo "Texto atual: " . $textoAtual . "\n";

desfazer($pilhaUndo, $pilhaRedo, $textoAtual);
// texto total: Olá
echo "Texto atual: " . $textoAtual . "\n";

refazer($pilhaRedo, $pilhaUndo, $textoAtual);
// texto total: Olá Mundo
echo "Texto atual: " . $textoAtual . "\n";

apagarTexto(6, $pilhaUndo, $pilhaRedo, $textoAtual);
// texto total: Olá M
echo "Texto atual: " . $textoAtual . "\n";
?>