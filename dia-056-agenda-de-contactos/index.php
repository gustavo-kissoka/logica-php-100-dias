<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/funcoes.php';

$pdo = conectarBD();

// Trata a remoção por GET
if (isset($_GET['acao']) && $_GET['acao'] === 'delete' && isset($_GET['id'])) {
    removerContacto($pdo, $_GET['id']);
    header('Location: index.php');
    exit;
}

// Trata os envios por POST (Criar / Editar)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
    if ($_POST['acao'] === 'create') {
        $nome = trim($_POST['nome'] ?? '');
        $telefone = trim($_POST['telefone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        
        // Processa o upload da foto via $_FILES
        $foto = processarUploadFoto($_FILES['foto'] ?? null);

        if (!empty($nome)) {
            adicionarContacto($pdo, $nome, $telefone, $email, $foto);
        }
        header('Location: index.php');
        exit;
    }

    if ($_POST['acao'] === 'edit') {
        $id = $_POST['id'] ?? null;
        $nome = trim($_POST['nome'] ?? '');
        $telefone = trim($_POST['telefone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        
        $foto = processarUploadFoto($_FILES['foto'] ?? null);

        if ($id && !empty($nome)) {
            editarContacto($pdo, $nome, $telefone, $email, $foto, $id);
        }
        header('Location: index.php');
        exit;
    }
}

// Captura a pesquisa via GET e lista os contactos
$termoBusca = trim($_GET['busca'] ?? '');
$contactos = listarContacto($pdo, $termoBusca);
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style.css">
    <title>Agenda de Contactos</title>
  </head>
  <body>
    <main class="app-container">
      <header class="header">
        <div class="header-top">
          <h1>Contactos</h1>
          <button class="btn-add" id="btn-open-create">+</button>
        </div>

        <div class="search-box">
          <form action="index.php" method="GET">
            <svg class="search-icon" viewBox="0 0 24 24">
              <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
            </svg>
            <input
              type="text"
              name="busca"
              placeholder="Pesquisar contacto..."
              value="<?php echo htmlspecialchars($termoBusca); ?>"
            />
          </form>
        </div>
      </header>

      <section class="contacts-list">
        <?php if (empty($contactos)) : ?>
          <p class="empty-list">Nenhum contacto encontrado.</p>
        <?php else: ?>
          <?php foreach ($contactos as $contacto) : ?>
            <?php 
              // Define uma imagem padrão se o contacto não tiver foto
              $caminhoFoto = !empty($contacto['foto']) ? $contacto['foto'] : 'assets/default-avatar.png'; 
            ?>
            <div class="contact-card">
              <div class="contact-info">
                <img
                  src="<?php echo htmlspecialchars($caminhoFoto); ?>"
                  alt="Foto de <?php echo htmlspecialchars($contacto['nome']); ?>"
                  class="avatar"
                />
                <div class="details">
                  <h3><?php echo htmlspecialchars($contacto['nome']); ?></h3>
                  <p><?php echo htmlspecialchars($contacto['telefone']); ?></p>
                  <p><?php echo htmlspecialchars($contacto['email']); ?></p>
                </div>
              </div>

              <div class="actions">
                <button
                  class="btn-icon edit btn-open-edit"
                  data-id="<?php echo $contacto['id']; ?>"
                  data-nome="<?php echo htmlspecialchars($contacto['nome']); ?>"
                  data-telefone="<?php echo htmlspecialchars($contacto['telefone']); ?>"
                  data-email="<?php echo htmlspecialchars($contacto['email']); ?>"
                  data-foto="<?php echo htmlspecialchars($caminhoFoto); ?>"
                >
                  <svg viewBox="0 0 24 24">
                    <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                  </svg>
                </button>
                
                <a
                  href="index.php?acao=delete&id=<?php echo $contacto['id']; ?>"
                  onclick="return confirm('Eliminar contacto?');"
                  class="btn-icon delete"
                >
                  <svg viewBox="0 0 24 24">
                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                  </svg>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </section>

      <!-- Modal de Adicionar -->
      <div class="modal-overlay" id="modal-create">
        <div class="modal-box">
          <div class="modal-header">
            <h2>Novo Contacto</h2>
            <button class="close-modal">&times;</button>
          </div>

          <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="acao" value="create" />

            <div class="form-group">
              <label>Foto do Contacto</label>
              <input type="file" name="foto" accept="image/*" />
            </div>
            <div class="form-group">
              <label>Nome Completo</label>
              <input type="text" name="nome" required />
            </div>
            <div class="form-group">
              <label>Telefone</label>
              <input type="tel" name="telefone" required />
            </div>
            <div class="form-group">
              <label>E-mail</label>
              <input type="email" name="email" required />
            </div>
            <button type="submit" class="btn-submit">Salvar Contacto</button>
          </form>
        </div>
      </div>

      <!-- Modal de Editar -->
      <div class="modal-overlay" id="modal-edit">
        <div class="modal-box">
          <div class="modal-header">
            <h2>Editar Contacto</h2>
            <button class="close-modal">&times;</button>
          </div>

          <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="acao" value="edit" />
            <input type="hidden" id="edit-id" name="id" value="" />

            <div class="form-group">
              <label>Alterar Foto</label>
              <input type="file" name="foto" accept="image/*" />
            </div>
            <div class="form-group">
              <label>Nome Completo</label>
              <input type="text" id="edit-nome" name="nome" required />
            </div>
            <div class="form-group">
              <label>Telefone</label>
              <input type="tel" id="edit-telefone" name="telefone" required />
            </div>
            <div class="form-group">
              <label>E-mail</label>
              <input type="email" id="edit-email" name="email" required />
            </div>
            <button type="submit" class="btn-submit">Atualizar Contacto</button>
          </form>
        </div>
      </div>
    </main>
    <script src="assets/script.js"></script>
  </body>
</html>