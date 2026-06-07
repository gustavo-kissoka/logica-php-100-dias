<?php
function entrarNaFila(&$fila, $novoCliente) {
    array_push($fila, $novoCliente);
}

function atender(&$fila) {
    if (empty($fila)) return "Ninguem na fila.";

    $clienteAtendido = array_shift($fila);
    return $clienteAtendido;
}

function proximoCliente(&$fila) {
    if (empty($fila)) return "Não há clientes na fila.";

    return $fila[0];
}

// EXTRAS

function tamanhoDaFila($fila) {
    return count($fila);
}


$fila = ['Maria', 'Gustavo', 'Pedro', 'Joaquim'];

$atendido = atender($fila);
echo "Atendendo: $atendido\n";

echo "Próximo da fila: " . proximoCliente($fila) . "\n";

echo "Tamanho da fila: " . tamanhoDaFila($fila) . "\n";

?>
