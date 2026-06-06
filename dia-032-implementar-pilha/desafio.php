<?php

function empilhar(&$pilha, $novoElemento) {
    array_push($pilha, $novoElemento);
}

function desempilhar(&$pilha) {
    $removido = array_pop($pilha);
    return $removido;
}

// extras: quantidade e verificar se esta vazia
function tamanho($pilha) {
    $tamanho = count($pilha);
    return $tamanho;
}

function estaVazia($pilha) {
   return count($pilha) === 0 ? true : false;
}

function topo($pilha) {
    $ultimo = end($pilha);
    return $ultimo;
}

$pilha = ["A", "B", "C"];

empilhar($pilha, "D");
empilhar($pilha, "E");

desempilhar($pilha); // retorna o elemento removido "E"

$topo = topo($pilha);
echo "Topo da pilha: $topo\n";

$tamanho = tamanho($pilha);
echo "Tamanho da pilha: $tamanho\n";

echo "Esta vazia: ";
var_dump(estaVazia($pilha));


?>