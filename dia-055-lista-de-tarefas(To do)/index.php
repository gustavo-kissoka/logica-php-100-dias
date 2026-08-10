<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/funcoes.php';

$pdo = conectarBD();
$tarefas = listarTarefas($pdo); 

// ações POST (adicionar e editar)

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
    if ($_POST['acao'] === 'cadastrar') {
        $titulo = trim($_POST['titulo'] ?? '');
        $descricao = trim($_POST['descricao'] ?? '');

        if (!empty($titulo)) {
            adicionarTarefa($pdo, $titulo, $descricao);
        }
        header('Location: index.php');
        exit;
    }

    if ($_POST['acao'] === 'editar') {
        $id = $_POST['id'] ?? null;
        $titulo = trim($_POST['titulo'] ?? '');
        $descricao = trim($_POST['descricao'] ?? '');

        if ($id && !empty($titulo)) {
            editarTarefa($pdo, $id, $titulo, $descricao);
        }
        header('Location: index.php');
        exit;
    }
}

// ações GET(concluir e deletar)
if (isset($_GET['acao']) && isset($_GET['id'])) {
  $id = (int)$_GET['id'];
  
  if($_GET['acao'] === 'concluir') {
    concluirTarefa($pdo, $id);
  } else if($_GET['acao'] === 'deletar') {
    removerTarefa($pdo, $id);

  }

  header('location: index.php');
  exit;
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/style.css">
  <title>Gerenciador de Tarefas | Glassmorphism UI</title>
</head>

<body>
  
  <main class="glass-container">
    <header class="header">
      <h1>Minhas Tarefas</h1>
      <button class="btn-add" id="btn-open-create">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
          <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
        </svg>
        Nova Tarefa
      </button>
    </header>

    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th class="col-id">ID</th>
            <th>Título</th>
            <th>Descrição</th>
            <th class="col-status">Status</th>
            <th class="col-date">Data</th>
            <th class="col-actions">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($tarefas)): ?>
            <tr>
              <td colspan="6" style="text-align: center; padding: 2rem;">Nenhuma tarefa encontrada.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($tarefas as $tarefa): ?>
              <tr>
                <td class="col-id">#<?php echo $tarefa['id']; ?></td>
                <td><strong><?php echo htmlspecialchars($tarefa['titulo']); ?></strong></td>
                <td><?php echo htmlspecialchars($tarefa['descricao']); ?></td>
                <td class="col-status">
                  <?php if ($tarefa['status'] === 'Concluída'): ?>
                    <span class="badge concluida">Concluída</span>
                  <?php else: ?>
                    <span class="badge pendente">Pendente</span>
                  <?php endif; ?>
                </td>
                <td class="col-date"><?php echo date('d/m/Y', strtotime($tarefa['criado_em'])); ?></td>
                <td class="col-actions">
                  <div class="action-btns">
                    <!-- Botão para Marcar concluída  -->
                    <?php if ($tarefa['status'] !== 'Concluída'): ?>
                      <a
                        href="index.php?acao=concluir&id=<?php echo $tarefa['id']; ?>"
                        class="btn-action complete"
                        title="Marcar como Concluída">
                        <svg viewBox="0 0 24 24">
                          <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                        </svg>
                      </a>
                    <?php endif; ?>

                    <!-- Botão Editar -->
                    <button
                      class="btn-action edit btn-open-edit"
                      data-id="<?php echo $tarefa['id']; ?>"
                      data-titulo="<?php echo htmlspecialchars($tarefa['titulo']); ?>"
                      data-descricao="<?php echo htmlspecialchars($tarefa['descricao']); ?>"
                      title="Editar">
                      <svg viewBox="0 0 24 24">
                        <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                      </svg>
                    </button>

                    <!-- Botão Remover -->
                    <a
                      href="index.php?acao=deletar&id=<?php echo $tarefa['id']; ?>"
                      onclick="return confirm('Excluir esta tarefa?');"
                      class="btn-action delete"
                      title="Remover">
                      <svg viewBox="0 0 24 24">
                        <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                      </svg>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </main>

  <div class="modal-overlay" id="modal-create">
    <div class="modal-box">
      <div class="modal-header">
        <h3>Adicionar Nova Tarefa</h3>
        <button class="close-btn close-modal">&times;</button>
      </div>

      <form action="index.php" method="POST">
        <input type="hidden" name="acao" value="cadastrar" />

        <div class="form-group">
          <label for="create-titulo">Título da Tarefa</label>
          <input
            type="text"
            id="create-titulo"
            name="titulo"
            placeholder="Ex: Estudar PHP"
            required />
        </div>
        <div class="form-group">
          <label for="create-descricao">Descrição</label>
          <textarea
            id="create-descricao"
            name="descricao"
            placeholder="Detalhes da tarefa..."></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancel close-modal">
            Cancelar
          </button>
          <button type="submit" class="btn-save">Criar Tarefa</button>
        </div>
      </form>
    </div>
  </div>

  <div class="modal-overlay" id="modal-edit">
    <div class="modal-box">
      <div class="modal-header">
        <h3>Editar Tarefa</h3>
        <button class="close-btn close-modal">&times;</button>
      </div>

      <form action="index.php" method="POST">
        <input type="hidden" name="acao" value="editar" />
        <input type="hidden" id="edit-id" name="id" />

        <div class="form-group">
          <label for="edit-titulo">Título da Tarefa</label>
          <input type="text" id="edit-titulo" name="titulo" required />
        </div>
        <div class="form-group">
          <label for="edit-descricao">Descrição</label>
          <textarea id="edit-descricao" name="descricao"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancel close-modal">
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