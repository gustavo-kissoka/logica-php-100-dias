##  Dia 19 — Longest Substring Without Repeating Characters

###  Descrição
Dada uma string, encontrar o tamanho da maior substring **sem caracteres repetidos**.

---

### 🖥️ Exemplos

| Entrada     | Saída |
|------------|------|
| abcabcbb   | 3 |
| bbbbb      | 1 |
| pwwkew     | 3 |

---

###  Lógica Utilizada (Sliding Window)

- Criar uma "janela" (array)
- Percorrer a string
- Para cada caractere:
  - Se não existir na janela → adicionar
  - Se já existir:
    - remover elementos do início até eliminar repetição
- Atualizar o maior tamanho encontrado

---

### 💡 Conceitos aprendidos
- Técnica de **Sliding Window (Janela Deslizante)**
- Controle dinâmico de dados
- Otimização de loops
- Evitar brute force
