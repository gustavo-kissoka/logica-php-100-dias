# 🚀 Dia 23 — Encontrar o Segundo Maior Número

## 🧠 Descrição

Este desafio consiste em encontrar o segundo maior número de um array sem utilizar funções prontas como `sort()` ou `max()`.

---

## 📌 Exemplo

### Entrada

```php
[10, 5, 8, 20, 15]
```

### Saída

```php
15
```

---

## ⚙️ Lógica Utilizada

O algoritmo percorre o array apenas uma vez.

Durante a iteração:

* uma variável armazena o maior número
* outra armazena o segundo maior

Quando um número maior é encontrado:

* o maior atual vira segundo maior
* o novo número vira o maior

---

## 💡 Conceitos Aplicados

* Arrays
* Loops
* Comparação de valores
* Controle de estado
* Complexidade O(n)

---

## 🛠️ Tecnologias

* PHP CLI

---

## 🎯 Objetivo

Treinar lógica de comparação e atualização dinâmica de variáveis.
