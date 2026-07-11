<?php
// ----- SISTEMA DE LIVROS -----
// 1. camada de dados CRUD
// o banco de dados em memoria
$bibliotecaBD = [];
$proximoId = 1;

//1.1 adicionar livros
function adicionarLivro($titulo, $autor, $ano, &$bibliotecaBD, &$proximoId)
{
    $novoLivro = [
        'id' => $proximoId++,
        'titulo' => trim($titulo),
        'autor' => trim($autor),
        'ano' => intval($ano, 10)
    ];

    $bibliotecaBD[] = $novoLivro;
    return $novoLivro;
}

//1.2 listar livros
function obterTodosLivros($bibliotecaBD)
{
    return $bibliotecaBD;
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
// nova função utilitaria
function buscarIndiceLivroPorId($id, $bibliotecaBD)
{
    foreach ($bibliotecaBD as $indice => $livro) {
        if ($livro['id'] == $id) {
            return $indice;
        }
    }

    return null;
}

// 1.3 editar livros 
function editarLivro($id, $novoTitulo, $novoAutor, $novoAno, &$bibliotecaBD)
{
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

    return true;
}

// 1.4 remover livros
function removerLivro($id, &$bibliotecaBD)
{
    $indice = buscarIndiceLivroPorId($id, $bibliotecaBD);

   if ($indice === null) {
       return false;
   }

    unset($bibliotecaBD[$indice]);
    return true;
}

function pesquisarLivroPorTitulo($termo, $bibliotecaBD)
{
    $livrosEncontrados = [];
    foreach ($bibliotecaBD as $livro) {
        if (strpos(strtolower($livro['titulo']), strtolower($termo)) !== false) {
            array_push($livrosEncontrados, $livro);
        }
    }
    return $livrosEncontrados;
}

function exibirLivro($livro)
{
    echo "ID: {$livro['id']} \n";
    echo "TITULO: {$livro['titulo']} \n";
    echo "AUTOR: {$livro['autor']} \n";
    echo "ANO: {$livro['ano']} \n";
    echo "--------------------------- \n";
}

// funções para interagir com o usuário no terminal
function cliAdicionar(&$bibliotecaBD, &$proximoId)
{
    echo "Digite o título do livro: ";
    $titulo = readline();
    echo "Digite o autor do livro: ";
    $autor = readline();
    echo "Digite o ano do livro: ";
    $ano = readline();

    if (!trim($titulo) || !trim($autor) || !is_numeric(trim($ano))) {
        echo "Erro: Dados inválidos. Livro não adicionado. \n";
        return;
    }
    adicionarLivro($titulo, $autor, $ano, $bibliotecaBD, $proximoId);
    echo "Livro adicionado com sucesso! \n";
}

function cliListar($bibliotecaBD)
{
    $livros = obterTodosLivros($bibliotecaBD);

    if (empty($livros)) {
        echo "Nenhum livro cadastrado. \n";
        return;
    }

    echo "Livros cadastrados: \n";
    foreach ($livros as $livro) {
        exibirLivro($livro);
    }
}

function cliEditar(&$bibliotecaBD)
{
    echo "Digite o ID do livro que deseja editar: ";
    $id = intval(readline(), 10);

    $livro = buscarLivrosPorId($id, $bibliotecaBD);
    if (!$livro) {
        echo "Livro não encontrado. \n";
        return;
    }

    echo "Digite o novo título do livro (atual: {$livro['titulo']}): ";
    $novoTitulo = readline();
    echo "Digite o novo autor do livro (atual: {$livro['autor']}): ";
    $novoAutor = readline();
    echo "Digite o novo ano do livro (atual: {$livro['ano']}): ";
    $novoAno = readline();

    editarLivro($id, $novoTitulo, $novoAutor, $novoAno, $bibliotecaBD);
    echo "\nLivro editado com sucesso! \n";
}

function cliRemover(&$bibliotecaBD)
{
    echo "Digite o ID do livro que deseja remover: ";
    $id = readline();

    $sucesso = removerLivro($id, $bibliotecaBD);
    if ($sucesso) {
        echo "Livro removido com sucesso! \n";
    } else {
        echo "Livro nao encontrado. \n";
    }
}

function cliProcurar($bibliotecaBD)
{
    echo "Digite o título para pesquisar: ";
    $termo = readline();

    $resultados = pesquisarLivroPorTitulo($termo, $bibliotecaBD);

    if (empty($resultados)) {
        echo "Nenhum livro encontrado. \n";
        return;
    }

    echo "Livros encontrados: \n";
    foreach ($resultados as $livro) {
        exibirLivro($livro);
    }
}

function iniciarSistema(&$bibliotecaBD, &$proximoId)
{
    $sistemaIniciado = true;

    while ($sistemaIniciado) {
        echo "----- SISTEMA DE LIVROS -----\n";
        echo "1 - Adicionar livro\n";
        echo "2 - Listar livros\n";
        echo "3 - Editar livro\n";
        echo "4 - Remover livro\n";
        echo "5 - Procurar livro\n";
        echo "6 - Encerrar sistema\n";
        echo "\n";
        echo "Escolha uma opção: ";
        $opcao = readline();

        switch ($opcao) {
            case '1':
                cliAdicionar($bibliotecaBD, $proximoId);
                break;
            case '2':
                cliListar($bibliotecaBD);
                break;
            case '3':
                cliEditar($bibliotecaBD);
                break;
            case '4':
                cliRemover($bibliotecaBD);
                break;
            case '5':
                cliProcurar($bibliotecaBD);
                break;
            case '6':
                $sistemaIniciado = false;
                echo "Sistema encerrado. \n";
                break;
            default:
                echo "Opção inválida. \n";
        }
    }
}

//inicializa o sistema
iniciarSistema($bibliotecaBD, $proximoId);
