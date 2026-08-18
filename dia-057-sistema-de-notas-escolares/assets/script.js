const modalCadastrar = document.getElementById("modal-cadastrar");
const modalEditar = document.getElementById("modal-editar");

document.getElementById("btn-open-cadastrar").addEventListener("click", () => {
  modalCadastrar.classList.add("active");
});

document.querySelectorAll(".btn-open-edit").forEach((btn) => {
  btn.addEventListener("click", (e) => {
    const target = e.currentTarget;
    document.getElementById("edit-id").value = target.getAttribute("data-id");
    document.getElementById("edit-nome").value =
      target.getAttribute("data-nome");
    document.getElementById("edit-turma").value =
      target.getAttribute("data-turma");
    document.getElementById("edit-disciplina").value =
      target.getAttribute("data-disciplina");
    document.getElementById("edit-nota1").value =
      target.getAttribute("data-nota1");
    document.getElementById("edit-nota2").value =
      target.getAttribute("data-nota2");
    document.getElementById("edit-media").value =
      target.getAttribute("data-media");

    modalEditar.classList.add("active");
  });
});

document.querySelectorAll(".close-modal").forEach((btn) => {
  btn.addEventListener("click", () => {
    modalCadastrar.classList.remove("active");
    modalEditar.classList.remove("active");
  });
});
