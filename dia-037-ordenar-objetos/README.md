#  Dia 37 — Ordenar Objetos (Array Associativo)

## Descrição

Neste desafio, o objetivo foi ordenar uma lista de produtos armazenados em um array associativo multidimensional.

Cada produto possui:

- Nome
- Preço

Foram implementadas duas formas de ordenação:

1. Ordenação por preço (do mais barato para o mais caro).
2. Ordenação por nome (ordem alfabética).

---

##  Lógica Utilizada

### 1. Ordenação por Preço

Foi utilizada a função `usort()` do PHP juntamente com o operador *Spaceship* (`<=>`).

A comparação é feita entre os preços dos produtos:

```php
return $a['preco'] <=> $b['preco'];
```

Funcionamento:

- Retorna `-1` se o primeiro preço for menor.
- Retorna `0` se forem iguais.
- Retorna `1` se o primeiro preço for maior.

Exemplo:

```text
Mouse    - 5000
Monitor  - 80000
```

Resultado:

```text
Mouse    - 5000
Monitor  - 80000
```

---

### 2. Ordenação por Nome

Foi utilizada a função `strcmp()` para comparar duas strings alfabeticamente.

```php
return strcmp($a['nome'], $b['nome']);
```

Funcionamento:

- Retorna valor negativo se o primeiro nome vier antes do segundo.
- Retorna `0` se forem iguais.
- Retorna valor positivo se vier depois.

Exemplo:

```text
Monitor
Mouse
Teclado
```

---

## Conceitos Aplicados

- Arrays associativos
- Arrays multidimensionais
- Funções anônimas (Closures)
- Ordenação personalizada
- `usort()`
- Operador Spaceship (`<=>`)
- `strcmp()`
- Estruturas de repetição (`foreach`)

---

## 🎯 Objetivo do Desafio

Aprender a ordenar estruturas de dados mais próximas de cenários reais, onde normalmente trabalha-se com registros compostos por vários atributos, como produtos, usuários, pedidos e clientes.

