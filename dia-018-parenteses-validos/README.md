## 📅 Dia 18 — Validador de Parênteses

### 🧠 Descrição
Dada uma string contendo apenas os caracteres:

() {} []

O objetivo é verificar se a sequência é **válida**.

### ✅ Regras
- Todo caractere de abertura deve ser fechado
- A ordem deve ser correta
- Cada fechamento deve corresponder ao tipo correto

### 🖥️ Exemplos

| Entrada   | Saída |
|----------|------|
| ()       | válido |
| (]       | inválido |
| {[]}     | válido |
| ((()     | inválido |

---

### ⚙️ Lógica Utilizada (Stack / Pilha)

- Criar uma pilha (array)
- Percorrer a string caractere por caractere
- Se for abertura → adicionar na pilha
- Se for fechamento:
  - verificar se a pilha está vazia → inválido
  - remover o topo
  - comparar se corresponde ao fechamento
- No final:
  - pilha vazia → válido
  - pilha com elementos → inválido

