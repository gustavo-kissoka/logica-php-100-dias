<?php

function adicionar(&$historico, &$redo, $novoTexto, &$textoAtual)
{

    // adicionar o texto atual ao histórico
    array_push($historico, $textoAtual); // ou $historico[] = $textoAtual
    // atualizar o texto atual
    $textoAtual = $novoTexto;
    // limpar o redo
    $redo = [];
}

// undo ctrl + z
function desfazer(&$historico, &$redo, &$textoAtual)
{
    // se não houver nada no histórico, não faz nada
    if (count($historico) === 0) return;

    // adicionar o texto atual ao redo
    $redo[] = $textoAtual;
    // pegar o último estado do histórico e colocar na pilha de redo
    $textoAtual = array_pop($historico);
}

function refazer(&$historico, &$redo, &$textoAtual)
{
    // se nao houver nada no redo, nao faz nada
    if (count($redo) === 0) return;

    $historico[] = $textoAtual;

    $textoAtual = array_pop($redo);
}

// estados iniciais
$historico = [];
$redo = [];
$textoAtual = "";

// adicionar no histórico
adicionar($historico, $redo, "Ola", $textoAtual); 
adicionar($historico, $redo, "Ola Mundo", $textoAtual);
adicionar($historico, $redo, "Ola Mundo!", $textoAtual);
echo "Texto atual:" . $textoAtual . "\n";

// ctrl +z 
desfazer($historico, $redo, $textoAtual);
echo "Texto atual:" . $textoAtual . "\n";

// ctrl + y
refazer($historico, $redo, $textoAtual);
echo "Texto atual:" . $textoAtual . "\n";


?>