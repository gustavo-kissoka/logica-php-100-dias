<?php
$caminhoFicheiro = 'biblioteca.json';
global $caminhoFicheiro;
$bibliotecaBD = [];
$proximoId = 1;

// 1. FUNÇÕES AUXILIARES 

// funcão auxiliar para carregar os dados do ficheiro
function carregarDados($caminhoFicheiro, &$bibliotecaBD, &$proximoId)
{

    if (!file_exists($caminhoFicheiro)) {
        file_put_contents($caminhoFicheiro, json_encode([], JSON_PRETTY_PRINT));
    }

    $dados = file_get_contents($caminhoFicheiro);
    $bibliotecaBD = json_decode($dados, true);

    if ($bibliotecaBD === null) {
        $bibliotecaBD = [];
    }
    // define o proximo id com base o maior id existente
    if (count($bibliotecaBD) > 0) {
        $maiorId = max(array_column($bibliotecaBD, 'id'));
        $proximoId = $maiorId + 1;
    } else {
        $proximoId = 1;
    }

}

function guardarDados($caminhoFicheiro, $bibliotecaBD)
{

    // file_put_contents($caminhoFicheiro, json_encode($bibliotecaBD, JSON_PRETTY_PRINT));
    $json = json_encode($bibliotecaBD, JSON_PRETTY_PRINT);
    file_put_contents($caminhoFicheiro, $json);
}

// função utilitaria para buscar por id
function buscarLivrosPorId($id, $bibliotecaBD)
{
    foreach ($bibliotecaBD as $livro) {
        if ($livro['id'] == $id) {
            return $livro;
        }
    }
    return null;
}

function buscarIndiceLivroPorId($id, $bibliotecaBD)
{
    foreach ($bibliotecaBD as $indice => $livro) {
        if ($livro['id'] == $id) {
            return $indice;
        }
    }

    return null;
}

// 2. FUNÇÕES DE OPERAÇÕES DO SISTEMA (CRUD)

//1.1 adicionar livros
function adicionarLivro($titulo, $autor, $ano, &$bibliotecaBD, &$proximoId)
{
    global $caminhoFicheiro; // acessar variavel global

    $novoLivro = [
        'id' => $proximoId++,
        'titulo' => trim($titulo),
        'autor' => trim($autor),
        'ano' => intval($ano, 10)
    ];

    $bibliotecaBD[] = $novoLivro;
    guardarDados($caminhoFicheiro, $bibliotecaBD);
    return $novoLivro;
}

// 1.2 editar livros 
function editarLivro($id, $novoTitulo, $novoAutor, $novoAno, &$bibliotecaBD)
{
    global $caminhoFicheiro;

    $indice = buscarIndiceLivroPorId($id, $bibliotecaBD);

    if ($indice === null) {
        return false;
    }

    if (trim($novoTitulo) !== "") {
        $bibliotecaBD[$indice]['titulo'] = trim($novoTitulo);
    }

    if (trim($novoAutor) !== "") {
        $bibliotecaBD[$indice]['autor'] = trim($novoAutor);
    }

    if (trim($novoAno) !== "") {
        $bibliotecaBD[$indice]['ano'] = intval($novoAno, 10);
    }

    guardarDados($caminhoFicheiro, $bibliotecaBD);
    return true;
}

// 1.3 remover livros
function removerLivro($id, &$bibliotecaBD)
{
    global $caminhoFicheiro;
    $indice = buscarIndiceLivroPorId($id, $bibliotecaBD);

    if ($indice === null) {
        return false;
    }

    unset($bibliotecaBD[$indice]);
    guardarDados($caminhoFicheiro, $bibliotecaBD);
    return true;
}

function pesquisarLivroPorTitulo($termo, $bibliotecaBD)
{
    $livrosEncontrados = [];
    foreach ($bibliotecaBD as $livro) {
        if (strpos(strtolower($livro['titulo']), strtolower($termo)) !== false) {
            $livrosEncontrados[] = $livro;
        }
    }
    return $livrosEncontrados;
}

?>