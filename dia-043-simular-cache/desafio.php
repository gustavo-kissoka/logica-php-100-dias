<?php
$cache = [];
$chave = 'gustavo';

// função que simula a busca demorada...
function buscarDados($chave)
{
    sleep(2); // atrasa a execução
    return "Dados do usuário $chave";
}

function obterDados($chave, &$cache)
{
    if (isset($cache[$chave])) {
        // se existir cache
        echo "[CACHE HIT] Dados encontrados na cache\n";
        return $cache[$chave];
    }
    // SE NÃO EXISTIR
    echo "[CACHE MISS] Buscando dados...\n";
    
    // BUSCA A INFORMAÇÃO
    $dadoBuscado =  buscarDados($chave);
    
    // guarda
    $cache[$chave] = $dadoBuscado;

    return $dadoBuscado;
}


// testes 
echo obterDados($chave, $cache);
echo "\n";
echo obterDados($chave, $cache);
echo "\n";
// ver o cache
print_r($cache);
?>