   // Elementos dos Modais
        const modalAdd = document.getElementById('modal-add');
        const modalEdit = document.getElementById('modal-edit');

        // botão para abrir o Modal Adicionar
        document.getElementById('btn-open-add').addEventListener('click', () => {
            modalAdd.classList.add('active');
        });

        // Botões para ABRIR Modal Editar (e preencher os campos com os dados atuais da tabela)
        document.querySelectorAll('.btn-open-edit').forEach(button => {
            button.addEventListener('click', (e) => {
                // Pega os dados armazenados nos data-attributes do botão
                const btn = e.currentTarget;
                const id = btn.getAttribute('data-id');
                const titulo = btn.getAttribute('data-titulo');
                const autor = btn.getAttribute('data-autor');
                const ano = btn.getAttribute('data-ano');

                // Preenche o formulário do modal de edição
                document.getElementById('edit-id').value = id;
                document.getElementById('edit-titulo').value = titulo;
                document.getElementById('edit-autor').value = autor;
                document.getElementById('edit-ano').value = ano;

                // Abre o modal de edição
                modalEdit.classList.add('active');
            });
        });

        // Lógica para FECHAR qualquer modal aberto ao clicar nos X ou nos botões Cancelar
        document.querySelectorAll('.close-modal, .close-modal-btn').forEach(button => {
            button.addEventListener('click', () => {
                modalAdd.classList.remove('active');
                modalEdit.classList.remove('active');
            });
        });

        // Lógica para Fechar o modal se o usuário clicar fora do quadro branco (no fundo escuro)
        window.addEventListener('click', (e) => {
            if (e.target === modalAdd) modalAdd.classList.remove('active');
            if (e.target === modalEdit) modalEdit.classList.remove('active');
        });