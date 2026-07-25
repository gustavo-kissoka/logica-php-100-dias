<?php
require_once 'desafio_funcoes.php';

// carrega todos os dados do ficheiro json 
carregarDados($caminhoFicheiro, $bibliotecaBD, $proximoId);

// para debug
// var_dump($bibliotecaBD);

// pesquisa pelo titulo 
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
  $termo = trim($_GET['search']);
  $bibliotecaBD = pesquisarLivroPorTitulo($termo, $bibliotecaBD);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['acao']) && $_POST['acao'] === 'remover') {

    $id = $_POST['id'];
    removerLivro($id, $bibliotecaBD);
  } elseif (!empty($_POST['id'])) {
    $id = $_POST['id'];

    $novoTitulo = $_POST['titulo'] ?? '';
    $novoAutor = $_POST['autor'] ?? '';
    $novoAno = $_POST['ano'] ?? '';

    editarLivro($id, $novoTitulo, $novoAutor, $novoAno, $bibliotecaBD);
  } else {


    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $ano = $_POST['ano'] ?? '';
    adicionarLivro($titulo, $autor, $ano, $bibliotecaBD, $proximoId);
  }
}



?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/style.css">
  <title>CRUD de Livros - Template com Modais</title>
</head>

<body>
  <!-- OS CÓDIGOS SVG PODES ENCONTRAR EM SITE COMO:
  Heroicons, Lucide ou Font Awesome SVGs
  -->
  <main class="container">
    <!-- HEADER -->
    <header class="crud-header">
      <h1 class="crud-title">Tabela de Livros</h1>

      <div class="search-add-group">
        <div class="search-bar">
          <form action="index.php" method="get">

            <svg viewBox="0 0 512 512">
              <path
                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
            </svg>
            <input type="text"
              name="search"
              value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>"
              placeholder="Buscar por título..." />
          </form>
        </div>

        <!-- Botão com trigger JS para o Modal Adicionar -->
        <button class="btn-add" id="btn-open-add">
          <svg width="14" height="14" viewBox="0 0 448 512">
            <path
              fill="currentColor"
              d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
          </svg>
          Adicionar Novo
        </button>
      </div>
    </header>

    <?php if (empty($bibliotecaBD)) : ?>
      <p>Nenhum livro cadastrado ainda.</p>
    <?php endif; ?>
    <!-- TABELA -->
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Autor</th>
          <th>Ano</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
       
        <?php foreach ($bibliotecaBD as $livro) : ?>
          <tr>
            <!-- O htmlspecialchars para segurança contra o XSS -->
            <td class="id-col"><?php echo $livro['id']; ?></td>
            <td><?php echo htmlspecialchars($livro['titulo']); ?></td>
            <td><?php echo htmlspecialchars($livro['autor']); ?></td>
            <td><?php echo htmlspecialchars($livro['ano']); ?></td>
            <td>
              <div class="action-btns">
                <!-- Botão Editar enviando os dados via data-attributes para preencher o modal -->
                <button
                  class="action-btn btn-edit btn-open-edit"
                  data-id="<?php echo $livro['id']; ?>"
                  data-titulo="<?php echo htmlspecialchars($livro['titulo']); ?>"
                  data-autor="<?php echo htmlspecialchars($livro['autor']); ?>"
                  data-ano="<?php echo htmlspecialchars($livro['ano']); ?>"
                  title="Editar">
                  <svg viewBox="0 0 512 512">
                    <path
                      d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.8 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-14.3 32-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                  </svg>
                </button>
                <form action="index.php" method="POST" style="display:inline">
                  <input type="hidden" name="acao" value="remover">
                  <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">
                  <button type="submit" class="action-btn btn-delete" title="Remover">
                    <svg viewBox="0 0 448 512">
                      <path
                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V400c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V400c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V400c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                    </svg>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </main>

  <!--MODAL ADICIONAR -->
  <div class="modal-overlay" id="modal-add">
    <div class="modal-container">
      <div class="modal-header">
        <h2>Adicionar Novo Livro</h2>
        <button class="close-modal">&times;</button>
      </div>
      
      <form action="index.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="add-titulo">Título</label>
            <input
              type="text"
              id="add-titulo"
              name="titulo"
              required
              placeholder="Ex: O Alquimista" />
          </div>
          <div class="form-group">
            <label for="add-autor">Autor</label>
            <input
              type="text"
              id="add-autor"
              name="autor"
              required
              placeholder="Ex: Paulo Coelho" />
          </div>
          <div class="form-group">
            <label for="add-ano">Ano de Publicação</label>
            <input
              type="number"
              id="add-ano"
              name="ano"
              required
              placeholder="Ex: 1988" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancel close-modal-btn">
            Cancelar
          </button>
          <button type="submit" class="btn-save">Salvar</button>
        </div>
      </form>
    </div>
  </div>

  <!--MODAL EDITAR -->
  <div class="modal-overlay" id="modal-edit">
    <div class="modal-container">
      <div class="modal-header">
        <h2>Editar Livro</h2>
        <button class="close-modal">&times;</button>
      </div>
    
      <form action="index.php" method="POST">
        <div class="modal-body">
          <!-- Campo escondido para guardar o ID do registro -->
          <input type="hidden" id="edit-id" name="id" />

          <div class="form-group">
            <label for="edit-titulo">Título</label>
            <input type="text" id="edit-titulo" name="titulo" required />
          </div>
          <div class="form-group">
            <label for="edit-autor">Autor</label>
            <input type="text" id="edit-autor" name="autor" required />
          </div>
          <div class="form-group">
            <label for="edit-ano">Ano de Publicação</label>
            <input type="number" id="edit-ano" name="ano" required />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancel close-modal-btn">
            Cancelar
          </button>
          <button type="submit" class="btn-save">Atualizar</button>
        </div>
      </form>
    </div>
  </div>

  <script src="assets/script.js"></script>
</body>

</html>