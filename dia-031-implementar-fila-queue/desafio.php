<?php

// remove o primeiro elemento da fila
function dequeue(&$fila) {

    if (empty($fila)) return "Nínguem na fila.";

    $removido = array_shift($fila);
    return $removido;
}

// insere um elemento na fila no ultimo lugar   
function enqueue(&$fila, $novoElemento) {
    array_push($fila, $novoElemento);
}

// ver quem esta na frente da fila
function front(&$fila) {
    if (empty($fila)) return null;

    return $fila[0];
}

$fila = ['Maria', 'Gustavo', 'Pedro', 'Joaquim'];

$atendido = dequeue($fila);
echo "Atendido: $atendido\n";

enqueue($fila, 'Pedro');

echo "Próximo da fila: " . front($fila) . "\n";

echo "Fila atual: ";
print_r($fila);
?>