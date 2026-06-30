# Dia 47 — Descompressão de String

## Descrição

Neste desafio, foi implementado um algoritmo capaz de descomprimir uma string no formato **caractere + quantidade**, reconstruindo a string original.

Exemplo:

```text
Entrada:  a3b4c
Saída:    aaabbbbc
```

A solução percorre a string comprimida e utiliza a quantidade informada para repetir cada caractere.

---

## Lógica Aplicada

1. Inicializar uma string vazia para armazenar o resultado.
2. Percorrer a string de entrada de dois em dois caracteres.
3. Ler o caractere atual.
4. Ler a quantidade de repetições (ou assumir `1` caso não exista).
5. Utilizar `str_repeat()` para repetir o caractere.
6. Concatenar o resultado na string final.
7. Retornar a string descomprimida.

---

## Conceitos Utilizados

- Strings
- Loops
- Manipulação de índices
- `strlen()`
- `isset()`
- `intval()`
- `str_repeat()`
- Concatenação de strings
```