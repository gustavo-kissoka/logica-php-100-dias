<?php

function iniciarJogo()
{
    echo "
  ███  ███   ███   ███     ████   ███      ███  ████  ███ █   █ ███ █   █ █   █  ███   ███   ███   ███    
   █░░█ ░░█ █ ░░░ █ ░░█    █░░░█ █ ░░█    █ ░░█ █░░░█  █░░█░  █░ █░░██  █░█░  █░█ ░░█ █ ░░█ █ ░░█ █ ░░█   
   █░░█░ ░█░█░ ██░█░ ░█░   █░░░█░█████░   █████░█░░░█░ █░░█░░ █░░█░░█░█ █░█████░█████░█░ ░█░█░ ░█░█░ ░█░  
█  █░░█░░ █░█░░ █░█░░ █░░  █░░ █░█░░░█░░  █░░░█░█░░ █░░█░░ █░█ ░░█░░█░░██░█░░░█░█░░░█░█░░ █░█░░ █░█░░ █░░ 
 ██ ░░ ███ ░░███ ░░███ ░░  ████ ░█░░░█░░  █░░░█░████ ░███░  █ ░ ███░█░░ █░█░░░█░█░░░█░░███ ░░███ ░░███ ░░ 
  ░░ ░  ░░░ ░ ░░░ ░ ░░░ ░   ░░░░ ░░░  ░░   ░░  ░░░░░░ ░░░░   ░ ░ ░░░ ░░  ░░░░  ░░░░  ░░ ░░░ ░ ░░░ ░ ░░░ ░ 
   ░░    ░░░   ░░░   ░░░     ░░░░  ░   ░    ░   ░ ░░░░  ░░░   ░   ░░░ ░   ░ ░   ░ ░   ░  ░░░   ░░░   ░░░     
   \n";
    echo "Pensei em um número entre 1 e 100. Você tem apenas 3 tentativas!\n";

    // gerar um número aleatório entre 1 e 100
    $numeroSecreto = rand(1, 100);

    $tentativasRestantes = 3;
    $acertou = false;

    while ($tentativasRestantes > 0) {
        echo "Tentativas restantes: $tentativasRestantes . Qual o seu palpite?\n";
        echo "Adivinhe o número: ";
        $num = trim(fgets(STDIN));

        // validação simples 
        if (!is_numeric($num) || $num < 1 || $num > 100) {
            echo "Por favor, digite um número entre 1 e 100.\n";
            continue;
        }

        if ($num === $numeroSecreto) {
            echo "Parabéns, você acertou o número!\n";
            $acertou = true;
            break; // termina o loop imediatamente
        } elseif ($num < $numeroSecreto) {
            echo "O número secreto é maior que $num\n";
        } else {
            echo "O número secreto é menor que $num\n";
        }

        $tentativasRestantes--;
    }
    // final do jogo
    if (!$acertou)  echo "Fim do jogo! O número secreto era: $numeroSecreto\n";
}

function cicloDeVida()
{
    $querJogar = true;

    while ($querJogar) {
        iniciarJogo(); // roda o jogo

        // pergunta se o jogador quer jogar novamente
        // apos a função do jogo terminar e limpar sua memoria
        // opcional - perguntar se o jogador quer jogar novamente
        echo "Deseja jogar novamente? (s/n): ";
        $resposta = strtolower(trim(fgets(STDIN)));
        $querJogar = ($resposta === 's');
    }

    echo "Obrigado por jogar!\n";
}

// pergunta se o jogador quer jogar
cicloDeVida();
?>