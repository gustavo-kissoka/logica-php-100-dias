const modalEditar = document.getElementById("modal-editar");
const novoComentario = document.getElementById("novo-comentario");
const counterNum = document.getElementById("counter-num");
const editComentario = document.getElementById("edit-comentario");
const editCounterNum = document.getElementById("edit-counter-num");


novoComentario.addEventListener("input", () => {
  counterNum.textContent = novoComentario.value.length;
});

editComentario.addEventListener("input", () => {
  editCounterNum.textContent = editComentario.value.length;
});

// Abrir Modal de Edição + Autocompletar Apenas o Comentário
document.querySelectorAll(".btn-open-edit").forEach((btn) => {
  btn.addEventListener("click", (e) => {
    const target = e.currentTarget;
    const comentarioTexto = target.getAttribute("data-comentario");

    document.getElementById("edit-id").value = target.getAttribute("data-id");
    editComentario.value = comentarioTexto;
    editCounterNum.textContent = comentarioTexto.length;

    modalEditar.classList.add("active");
  });
});

document.querySelectorAll(".close-modal").forEach((btn) => {
  btn.addEventListener("click", () => {
    modalEditar.classList.remove("active");
  });
});
