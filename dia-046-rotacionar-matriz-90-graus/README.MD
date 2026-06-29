# Dia 46 — Rotacionar Matriz 90°

## Descrição

**Por ser um novo tipo de desafio pareceu-me difícil de resolver. Depois de algumas pesquisas consegui resolver o problema.**

Neste desafio, foi implementado um algoritmo para rotacionar uma matriz quadrada (`N x N`) em **90° no sentido horário**, sem criar uma nova matriz.

A solução modifica a matriz original diretamente, tornando o algoritmo mais eficiente em termos de memória.

---

## Lógica Aplicada

A rotação foi realizada em duas etapas:

1. **Transpor a matriz**
   - Trocar os elementos da posição `[i][j]` por `[j][i]`.
   - Linhas tornam-se colunas.

2. **Inverter cada linha**
   - Após a transposição, cada linha é invertida utilizando `array_reverse()`.
   - O resultado é a matriz rotacionada em 90° no sentido horário.

---

## Conceitos Utilizados

- Matrizes (Arrays Bidimensionais)
- Loops Aninhados
- Permutação de Elementos (Swap)
- Manipulação de Índices
- `array_reverse()`
- Algoritmos de Transformação de Matrizes