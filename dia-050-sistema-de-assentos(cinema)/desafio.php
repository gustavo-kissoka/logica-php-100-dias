<?php
// SISTEMA DE ASSENTO DE CINEMA
// DIVISÃO DE REPONSABILIDADES -> cada função tem sua responsabilidade
// ======== FUNÇÕES ========

//1. MOSTRAR ASSENTO
function mostrarAssentos($sala, $letrasFilas)
{
    echo "\n     1  2  3  4  5  6\n\n";
    for ($i = 0; $i < count($sala); $i++) {
        // Imprime a letra e junta os assentos da linha com espaço duplo
        echo $letrasFilas[$i] . "    " . implode('  ', $sala[$i]) . "\n";
        
    }
}

// função para validar e descodificar a string do assento (ex.: B4)
function decodificarAssento($entrada, $mapeamentoFilas)
{
    $texto = strtoupper(trim($entrada));
    // validação básica de tamanho do assento deve ter exatamente 
    // 2 caracteres ex.: "A1" até "E6"
    if (strlen($texto) != 2) return null;

    $letraF = $texto[0];
    $numeroC = intval($texto[1], 10);

    // verifica se a letra existe no nosso mapa
    // e se a coluna esta entre 1 e 6
    if (isset($mapeamentoFilas[$letraF]) && $numeroC >= 1 && $numeroC <= 6) {

        return [
            'linha' => $mapeamentoFilas[$letraF],
            'coluna' => $numeroC - 1 // Subtrai 1 para ajustar ao índice baseado em zero (0-5)
        ];
    }
    return null;
}

//2. RESERVAR ASSENTOS
function reservarAssento(&$sala, $mapeamentoFilas)
{
    echo "Digite a letra e o número do assento que desarja reservar, exemplo B4: ";
    $entrada = trim(fgets(STDIN));
    $coordenadas = decodificarAssento($entrada, $mapeamentoFilas);

    if (!$coordenadas) {
        echo "Assento inválido\n";
        return;
    }

    $linha = $coordenadas['linha'];
    $coluna = $coordenadas['coluna'];

    if ($sala[$linha][$coluna] === "O") {
        $sala[$linha][$coluna] = "X";
        echo "Assento reservado com sucesso!\n";
    } else {
        echo "Assento já reservado.\n";
    }
}

// 3. CANCELAR RESERVAS
function cancelarReserva(&$sala, $mapeamentoFilas)
{
    echo "Digite a letra e o número do assento que desarja cancelar, exemplo B4: ";
    $entrada = trim(fgets(STDIN));
    $coordenadas = decodificarAssento($entrada, $mapeamentoFilas);

    if (!$coordenadas) {
        echo "Assento inválido\n";
        return;
    }

    $linha = $coordenadas['linha'];
    $coluna = $coordenadas['coluna'];

    if ($sala[$linha][$coluna] === "X") {
        $sala[$linha][$coluna] = "O"; // libera o assento
        echo "Reserva cancelada com sucesso!\n";
    } else {
        echo " Esse assento já está livre.\n";
    }
}

// 4. MOSTRAR ESTATÍSTICAS

function mostrarEstatisticas($sala)
{   
    $totalLugares = count($sala) * count($sala[0]); // 5 filas e 6 lugares por fila
    $reservados = 0;

    // varre a matriz contando os assentos ocupados
    for ($i = 0; $i < count($sala); $i++) {
        for ($j = 0; $j < count($sala[$i]); $j++) {
            if ($sala[$i][$j] === "X") {
                $reservados++;
            }
        }
    }

    $livres = $totalLugares - $reservados;
    // clacula o percentual de assentos ocupados
    $percentual = round($reservados / $totalLugares * 100, 2);

    echo "\n ESTATÍSTICAS\n";
    echo "Total de assentos: $totalLugares\n";
    echo "Assentos ocupados: $reservados\n";
    echo "Assentos livres: $livres\n";
    echo "Percentual de assentos ocupados: $percentual%\n";
}


function executarSistemaCinema()
{
    // 1. Estado inicial: Matriz 5x6 preenchida com "O" (Livre)
    // 5 linhas (A-E) e 6 colunas (1-6)  
    $sala = [
        ["O", "O", "O", "O", "O", "O"], // linha 0 (A)
        ["O", "O", "O", "O", "O", "O"], // linha 1 (B)
        ["O", "O", "O", "O", "O", "O"], // linha 2 (C)
        ["O", "O", "O", "O", "O", "O"], // linha 3 (D)
        ["O", "O", "O", "O", "O", "O"] // linha 4 (E)
    ];
    // mapeamento para converter a letra informada 
    // no indice da linha da matriz
    $mapeamentoFilas = [
        "A" => 0,
        "B" => 1,
        "C" => 2,
        "D" => 3,
        "E" => 4

    ];
    $letrasFilas = ["A", "B", "C", "D", "E"];

    $sistemaAtivo = true;

    // loop principal do sistema
    while ($sistemaAtivo) {
        echo "SISTEMA DE ASSENTO DE CINEMA\n";
        echo "1. Mostrar assentos\n";
        echo "2. Reservar assento\n";
        echo "3. Cancelar reserva\n";
        echo "4. Mostrar estatísticas\n";
        echo "5. Sair\n";

        echo "Escolha uma opção: ";
        $opcao = trim(fgets(STDIN));

        switch ($opcao) {
            case "1":
                mostrarAssentos($sala, $letrasFilas);
                break;
            case "2":
                reservarAssento($sala, $mapeamentoFilas);
                break;
            case "3":
                cancelarReserva($sala, $mapeamentoFilas);
                break;
            case "4":
                mostrarEstatisticas($sala);
                break;
            case "5":
                echo "Encerrando o sistema...\n";
                $sistemaAtivo = false;
                break;
            default:
                echo "Opção inválida\n";
        }
    }
}

// inicia o sistema
executarSistemaCinema();
?>