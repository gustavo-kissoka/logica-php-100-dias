# Dia 45 — Editor de Texto Simples

## Descrição

Neste desafio, foi desenvolvido um editor de texto simples capaz de realizar operações básicas de edição.

Além de adicionar e apagar texto, foi implementado um sistema de **Undo** (desfazer) e **Redo** (refazer), permitindo restaurar estados anteriores do texto, semelhante ao funcionamento de editores reais.

---

## Lógica Aplicada

O editor utiliza duas pilhas para controlar o histórico das alterações:

- **Pilha Undo:** armazena os estados anteriores do texto.
- **Pilha Redo:** armazena os estados desfeitos para que possam ser refeitos posteriormente.

### Funcionamento

- **Adicionar texto**
  - Guarda o estado atual na pilha de Undo.
  - Limpa a pilha de Redo.
  - Concatena o novo texto ao texto atual.

- **Apagar texto**
  - Guarda o estado atual na pilha de Undo.
  - Limpa a pilha de Redo.
  - Remove os últimos caracteres utilizando `substr()`.

- **Desfazer (Undo)**
  - Move o estado atual para a pilha de Redo.
  - Recupera o último estado armazenado na pilha de Undo.

- **Refazer (Redo)**
  - Move o estado atual para a pilha de Undo.
  - Recupera o último estado armazenado na pilha de Redo.

---
