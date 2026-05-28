#  Dia 25 — Produto do Array Exceto Ele Mesmo

##  Descrição

Este desafio consiste em retornar um array onde cada posição contém o produto de todos os elementos do array, exceto o elemento atual.

A solução não pode utilizar divisão.

---

##  Exemplo

### Entrada

```php
[1,2,3,4]
```

### Saída

```php
[24,12,8,6]
```

---

## Lógica Utilizada

O algoritmo utiliza duas passagens:

### Prefixo (esquerda)

Armazena o produto acumulado dos elementos anteriores.

### Sufixo (direita)

Multiplica os produtos acumulados dos elementos posteriores.

O resultado final é obtido multiplicando os dois produtos.

---

##  Conceitos Aplicados

* Prefix Product
* Suffix Product
* Loops
* Arrays
* Otimização O(n)
* Reutilização de memória

---

##  Tecnologias

* PHP CLI

---

##  Objetivo

Treinar algoritmos eficientes e manipulação acumulativa de arrays.
