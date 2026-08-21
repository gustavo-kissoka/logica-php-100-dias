<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/include/funcoes.php';

$pdo = conectarBD();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/style.css">
  <title>ERP Escolar | Gestão de Notas</title>
</head>

<body>

  <div class="app-container">



    <header class="header">
      <h1>Sistema Escolar ERP</h1>
      <button class="btn-clay" id="btn-open-cadastrar">+ Cadastrar Aluno</button>
    </header>


    <section class="dashboard-grid">
      <div class="card-stat alunos">
        <span>Alunos</span>
        <h2>28</h2>
      </div>
      <div class="card-stat aprovados">
        <span>Aprovados</span>
        <h2>20</h2>
      </div>
      <div class="card-stat reprovados">
        <span>Reprovados</span>
        <h2>8</h2>
      </div>
      <div class="card-stat media">
        <span>Média Geral</span>
        <h2>13.7</h2>
      </div>
    </section>


    <main class="content-card">
      <div class="card-header">
        <h3>Gestão de Notas</h3>


        <div class="search-box">
          <form action="index.php" method="GET">
            <svg class="search-icon" viewBox="0 0 24 24">
              <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
            </svg>
            <input type="text" name="pesquisa" placeholder="Pesquisar aluno...">
          </form>
        </div>
      </div>


      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>Nome</th>
              <th>Turma</th>
              <th>Disciplina</th>
              <th>Média</th>
              <th>Situação</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td><strong>Carlos Alberto</strong></td>
              <td>Turma A (10ª)</td>
              <td>Matemática</td>
              <td><strong>15.0</strong></td>
              <td><span class="badge-status aprovado">Aprovado</span></td>
              <td>
                <div class="actions-cell">
                  <!-- Editar Aluno e Nota -->
                  <button class="btn-action edit btn-open-edit"
                    data-id="1"
                    data-nome="Carlos Alberto"
                    data-turma="Turma A (10ª)"
                    data-disciplina="Matemática"
                    data-nota1="10.0"
                    data-nota2="15.0"
                    data-media="15.0"
                    title="Editar">
                    <svg viewBox="0 0 24 24">
                      <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                    </svg>
                  </button>


                  <a href="deletar.php?id=1" onclick="return confirm('Remover registo?')" class="btn-action delete" title="Remover">
                    <svg viewBox="0 0 24 24">
                      <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                    </svg>
                  </a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>

  </div>

  <div class="modal-overlay" id="modal-cadastrar">
    <div class="modal-card">
      <div class="modal-header">
        <h3>Cadastrar Registo</h3>
        <button class="close-btn close-modal">&times;</button>
      </div>

      <form action="cadastrar.php" method="POST">
        <div class="form-group">
          <label>Nome do Aluno</label>
          <input type="text" name="nome" required placeholder="Ex: João Manuel">
        </div>

        <div class="grid-inputs">
          <div class="form-group">
            <label>Turma</label>
            <input type="text" name="turma" required placeholder="Ex: Turma A">
          </div>
          <div class="form-group">
            <label>Disciplina</label>
            <input type="text" name="disciplina" required placeholder="Ex: História">
          </div>
        </div>


        <div class="grid-inputs">
          <div class="form-group">
            <label>1ª Nota</label>
            <input type="number" step="0.1" min="0" max="20" id="cad-nota1" name="nota1" required placeholder="0.0">
          </div>
          <div class="form-group">
            <label>2ª Nota</label>
            <input type="number" step="0.1" min="0" max="20" id="cad-nota2" name="nota2" required placeholder="0.0">
          </div>
        </div>


        <div class="form-group">
          <label>Média Final</label>
          <input type="number" step="0.1" min="0" max="20" id="cad-media" name="media" placeholder="Calculado automaticamente" readonly>
        </div>

        <button type="submit" class="btn-clay" style="width: 100%; margin-top: 10px;">Salvar Registo</button>
      </form>
    </div>
  </div>


  <div class="modal-overlay" id="modal-editar">
    <div class="modal-card">
      <div class="modal-header">
        <h3>Editar Registo</h3>
        <button class="close-btn close-modal">&times;</button>
      </div>

      <form action="editar.php" method="POST">
        <input type="hidden" id="edit-id" name="id">

        <div class="form-group">
          <label>Nome do Aluno</label>
          <input type="text" id="edit-nome" name="nome" required>
        </div>

        <div class="grid-inputs">
          <div class="form-group">
            <label>Turma</label>
            <input type="text" id="edit-turma" name="turma" required>
          </div>
          <div class="form-group">
            <label>Disciplina</label>
            <input type="text" id="edit-disciplina" name="disciplina" required>
          </div>
        </div>


        <div class="grid-inputs">
          <div class="form-group">
            <label>1ª Nota</label>
            <input type="number" step="0.1" min="0" max="20" id="edit-nota1" name="nota1" required>
          </div>
          <div class="form-group">
            <label>2ª Nota</label>
            <input type="number" step="0.1" min="0" max="20" id="edit-nota2" name="nota2" required>
          </div>
        </div>


        <div class="form-group">
          <label>Média Final</label>
          <input type="number" step="0.1" min="0" max="20" id="edit-media" name="media" readonly>
        </div>

        <button type="submit" class="btn-clay" style="width: 100%; margin-top: 10px;">Atualizar Registo</button>
      </form>
    </div>
  </div>

  <script src="assets/script.js"></script>
</body>

</html>