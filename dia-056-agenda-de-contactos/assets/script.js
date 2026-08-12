const modalCreate = document.getElementById("modal-create");
const modalEdit = document.getElementById("modal-edit");

// Abrir Modal Criar
document.getElementById("btn-open-create").addEventListener("click", () => {
  modalCreate.classList.add("active");
});

// Abrir Modal Editar e carregar dados dos atributos data-*
document.querySelectorAll(".btn-open-edit").forEach((btn) => {
  btn.addEventListener("click", (e) => {
    const target = e.currentTarget;
    document.getElementById("edit-id").value = target.getAttribute("data-id");
    document.getElementById("edit-nome").value =
      target.getAttribute("data-nome");
    document.getElementById("edit-telefone").value =
      target.getAttribute("data-telefone");
    document.getElementById("edit-email").value =
      target.getAttribute("data-email");

    modalEdit.classList.add("active");
  });
});

document.querySelectorAll(".close-modal").forEach((btn) => {
  btn.addEventListener("click", () => {
    modalCreate.classList.remove("active");
    modalEdit.classList.remove("active");
  });
});