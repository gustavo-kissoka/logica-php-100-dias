<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>StockGUS | Gestão de Inventário</title>
</head>
<body>

    <div class="app-container">

        
        <header class="header">
            <h1>Stock<span>gUs</span></h1>
            
            <button class="btn-glow" id="btn-open-adicionar">+ Adicionar Produto</button>
        </header>

      
        <section class="dashboard-grid">
            <div class="stat-card produtos">
                <span>Total de Produtos</span>
                <h2>45</h2>
            </div>
            <div class="stat-card em-stock">
                <span>Produtos em Stock</span>
                <h2>38</h2>
            </div>
            <div class="stat-card sem-stock">
                <span>Produtos sem Stock</span>
                <h2>7</h2>
            </div>
            <div class="stat-card valor-total">
                <span>Valor Total Inventário</span>
                <h2>1.250.000 Kz</h2>
            </div>
        </section>

        <main class="content-card">
            <div class="card-header">
                <h3>Lista de Produtos em Stock</h3>
                
               
                <div class="search-box">
                    <form action="index.php" method="GET">
                        <svg class="search-icon" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
                        <input type="text" name="pesquisa" placeholder="Pesquisar produto...">
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produto (Nome)</th>
                            <th>Categoria</th>
                            <th>Preço</th>
                            <th>Stock</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                       
                        <tr>
                            <td><strong>#001</strong></td>
                            <td>Computador HP Pavilion</td>
                            <td>Informática</td>
                            <td>350.000 Kz</td>
                            <td>
                             
                                <span class="badge-stock disponivel">● 12 un</span>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    
                                    <button class="btn-action edit btn-open-editar" 
                                            data-id="1" 
                                            data-nome="Computador HP Pavilion" 
                                            data-categoria="Informática" 
                                            data-preco="350000" 
                                            data-quantidade="12"
                                            title="Editar Produto">
                                        <svg viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                    </button>

                                   
                                    <a href="remover.php?id=1" onclick="return confirm('Tem certeza que deseja remover este produto?')" class="btn-action delete" title="Remover Produto">
                                        <svg viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>

                       
                        <tr>
                            <td><strong>#002</strong></td>
                            <td>Teclado Mecânico RGB</td>
                            <td>Acessórios</td>
                            <td>25.000 Kz</td>
                            <td>
                               
                                <span class="badge-stock esgotado">● Esgotado (0)</span>
                            </td>
                            <td>
                                <div class="actions-cell">
                                    <button class="btn-action edit btn-open-editar" 
                                            data-id="2" 
                                            data-nome="Teclado Mecânico RGB" 
                                            data-categoria="Acessórios" 
                                            data-preco="25000" 
                                            data-quantidade="0"
                                            title="Editar Produto">
                                        <svg viewBox="0 0 24 24"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                    </button>

                                    <a href="remover.php?id=2" onclick="return confirm('Tem certeza que deseja remover este produto?')" class="btn-action delete" title="Remover Produto">
                                        <svg viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </main>

    </div>

    
    <div class="modal-overlay" id="modal-adicionar">
        <div class="modal-card">
            <div class="modal-header">
                <h3>Adicionar Novo Produto</h3>
                <button class="close-btn close-modal">&times;</button>
            </div>
            
            <form action="adicionar.php" method="POST">
                <div class="form-group">
                    <label>Nome do Produto</label>
                    <input type="text" name="nome" required placeholder="Ex: Impressora Epson">
                </div>
                
                <div class="form-group">
                    <label>Categoria</label>
                    <input type="text" name="categoria" required placeholder="Ex: Escritório">
                </div>

                <div class="grid-inputs">
                    <div class="form-group">
                        <label>Preço (Kz)</label>
                        <input type="number" step="0.01" min="0" name="preco" required placeholder="0.00">
                    </div>
                    <div class="form-group">
                        <label>Quantidade</label>
                        <input type="number" min="0" name="quantidade" required placeholder="0">
                    </div>
                </div>

                <button type="submit" class="btn-glow" style="width: 100%; margin-top: 10px;">Guardar Produto</button>
            </form>
        </div>
    </div>

  
    <div class="modal-overlay" id="modal-editar">
        <div class="modal-card">
            <div class="modal-header">
                <h3>Editar Produto</h3>
                <button class="close-btn close-modal">&times;</button>
            </div>
            
            <form action="editar.php" method="POST">
                <!-- ID Escondido para o PHP -->
                <input type="hidden" id="edit-id" name="id">

                <div class="form-group">
                    <label>Nome do Produto</label>
                    <input type="text" id="edit-nome" name="nome" required>
                </div>
                
                <div class="form-group">
                    <label>Categoria</label>
                    <input type="text" id="edit-categoria" name="categoria" required>
                </div>

                <div class="grid-inputs">
                    <div class="form-group">
                        <label>Preço (Kz)</label>
                        <input type="number" step="0.01" min="0" id="edit-preco" name="preco" required>
                    </div>
                    <div class="form-group">
                        <label>Quantidade</label>
                        <input type="number" min="0" id="edit-quantidade" name="quantidade" required>
                    </div>
                </div>

                <button type="submit" class="btn-glow" style="width: 100%; margin-top: 10px;">Atualizar Registo</button>
            </form>
        </div>
    </div>

    
    <script src="assets/script.js"></script>
</body>
</html>