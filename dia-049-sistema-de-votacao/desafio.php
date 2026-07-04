<?php
      echo " 
 ████ ███  ████ █████ █████ █   █  ███     ████  █████    █   █  ███  █████  ███   ███   ███   ███  
█      █  █       █   █     ██ ██ █   █    █   █ █        █   █ █   █   █   █   █ █     █   █ █   █ 
 ███   █   ███    █   ████  █ █ █ █████    █   █ ████     █   █ █   █   █   █████ █     █████ █   █ 
    █  █      █   █   █     █   █ █   █    █   █ █         █ █  █   █   █   █   █ █     █   █ █   █ 
████  ███ ████    █   █████ █   █ █   █    ████  █████      █    ███    █   █   █  ███  █   █  ███  
        \n";

function sistemaDeVotacao() {
    
    
    // lista de candidatos
    $candidatos = [];
   

    $votacaoAtiva = true;
    

    while ($votacaoAtiva) {
        
        echo "\n1 - Cadastrar candidato\n";
        echo "2 - Votar\n";
        echo "3 - Ver resultados parcial\n";
        echo "4 - Mostrar vencedor\n";
        echo "5 - Encerrar votação\n";
        echo "\n";
        // opção do menu
        echo "Escolha uma opção: ";
        $opcao = trim(fgets(STDIN));

        switch ($opcao) {
            case 1: 
                // cadastrar candidato
                echo "CADASTRAR NOVO CANDIDATO\n";
                echo "Nome: ";
                $nome = trim(fgets(STDIN));
                
                $id = count($candidatos);

                if ($nome === "") {
                    echo "O nome não pode estar vazio.\n";
                }else {
                    // id gerado automaticamente
                    $id++;
                    $candidatos[] = [
                        "id" => $id,
                        "nome" => $nome,
                        "votos" => 0
                    ];
                    echo "Candidato $nome cadastrado com sucesso.\n";
                    echo "\n";
                }
                break;

            case 2: 
                // votar
                if (empty($candidatos)) {
                    echo "Não há candidatos cadastrados.\n";
                    break;
                }

                echo "\n LISTA DE CANDIDATOS";

                foreach ($candidatos as &$candidato) {
                    echo "\n" . $candidato['id'] . " - " . $candidato['nome'] . " - " . $candidato['votos'] . " votos";
                }

                echo "\nDigite o número do candidato: ";
                $votoId = (int)trim(fgets(STDIN));
                $votoEncontrado = false;
                foreach ($candidatos as &$candidato) {
                    if ($candidato['id'] === $votoId) {
                        $candidato['votos']++;
                        echo "Voto registrado com sucesso para " . $candidato['nome'] . "!.\n";
                        $votoEncontrado = true;
                        break;
                    }
                }
                if (!$votoEncontrado) {
                    echo "Candidato inexistente.\n";
                }
                break;

            case 3: 
                // ver resultados parcial                
                if (empty($candidatos)) {
                    echo "Não há candidatos cadastrados.\n";
                    break;
                }

                 echo "\n RESULTADOS PARCIAL\n";

                foreach ($candidatos as $candidato) {
                    echo "\n" . $candidato['id'] . " - " . $candidato['nome'] . " - " . $candidato['votos'] . " voto(s)";
                }
                break;

            case 4: 
                // mostrar vencedor
                if (empty($candidatos)) {
                    echo "Não há candidatos cadastrados.\n";
                    break;
                }

                echo "\n VENCEDOR ATUAL\n";
                $vencedor = $candidatos[0];
                $empate = false;

                for ($i = 1; $i < count($candidatos); $i++) {
                    if ($candidatos[$i]['votos'] > $vencedor['votos']) {
                        $vencedor = $candidatos[$i];
                        $empate = false;
                    }elseif ($candidatos[$i]['votos'] === $vencedor['votos'] && $vencedor['votos'] > 0) {
                        $empate = true;
                    }
                }

                if ($vencedor['votos'] === 0) {
                    echo "Ninguém votou ainda.\n";
                }elseif ($empate) {
                    echo "A votação esta empatada neste momento.\n";
                }else {
                    echo $vencedor['nome'] . " foi eleito com " . $vencedor['votos'] . " voto(s).\n";
                }
                break;

            case 5:
                // encerrar votação
                echo "Votação encerrada com sucesso.\n";
                $votacaoAtiva = false;
                break;
            default:
                echo "Opção inválida! Tente novamente.\n";
                break;

        }
    }
}

// iniciar o sistema de votação
sistemaDeVotacao();
?>