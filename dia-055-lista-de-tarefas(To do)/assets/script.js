const modalCreate = document.getElementById("modal-create");
const modalEdit = document.getElementById("modal-edit");
const btnOpenCreate = document.getElementById("btn-open-create");

// ABRIR MODAL DE CRIAR
btnOpenCreate.addEventListener("click", () => {
  modalCreate.classList.add("active");
});

// ABRIR MODAL DE EDITAR (Passando os dados dinamicamente)
document.querySelectorAll(".btn-open-edit").forEach((button) => {
  button.addEventListener("click", (e) => {
    const btn = e.currentTarget;

    // Atribui os dados guardados nos atributos data-* para os inputs do modal
    document.getElementById("edit-id").value = btn.getAttribute("data-id");
    document.getElementById("edit-titulo").value =
      btn.getAttribute("data-titulo");
    document.getElementById("edit-descricao").value =
      btn.getAttribute("data-descricao");

    modalEdit.classList.add("active");
  });
});

// FECHAR QUALQUER MODAL
document.querySelectorAll(".close-modal").forEach((btn) => {
  btn.addEventListener("click", () => {
    modalCreate.classList.remove("active");
    modalEdit.classList.remove("active");
  });
});

// FECHAR AO CLICAR NO ESPAÇO FORA DO QUADRO
window.addEventListener("click", (e) => {
  if (e.target === modalCreate) modalCreate.classList.remove("active");
  if (e.target === modalEdit) modalEdit.classList.remove("active");
});
