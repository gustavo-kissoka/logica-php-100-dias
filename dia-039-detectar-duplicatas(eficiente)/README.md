# Dia 39 — Detectar Duplicados Eficiente

## Descrição

Neste desafio, o objetivo foi verificar se um array contém valores duplicados utilizando uma abordagem eficiente.

Em vez de comparar cada elemento com todos os outros (o que seria mais lento), foi utilizada uma estrutura de dados auxiliar para armazenar os valores já encontrados durante a percorrida do array.

A função retorna:

- `true` se existir pelo menos um valor duplicado.
- `false` caso todos os valores sejam únicos.

---

## Lógica Utilizada

A solução utiliza um array associativo como um HashMap para registrar os valores já visitados.

### Passo a passo

1. Criar um mapa vazio.
2. Percorrer cada elemento do array.
3. Verificar se o elemento já existe no mapa.
4. Se existir, significa que o valor apareceu anteriormente e há uma duplicata.
5. Caso não exista, armazenar o valor no mapa.
6. Se o loop terminar sem encontrar repetições, retornar `false`.

### Exemplo

Array:

```php
[10, 20, 30, 40, 10]
```

Execução:

```text
10 -> não existe -> adicionar ao mapa
20 -> não existe -> adicionar ao mapa
30 -> não existe -> adicionar ao mapa
40 -> não existe -> adicionar ao mapa
10 -> já existe -> duplicata encontrada
```

Resultado:

```php
true
```

---

## Estrutura Mental

Para cada elemento do array:

```text
Já vi este valor antes?
```

- Sim → retornar `true`.
- Não → armazenar no mapa e continuar.

---

## Conceitos Aplicados

- Arrays associativos
- HashMap
- Busca em tempo constante (O(1))
- Estruturas de repetição (`foreach`)
- Funções
- Detecção de duplicados
- Complexidade de algoritmos

---

## Complexidade

### Tempo

```text
O(n)
```

O array é percorrido apenas uma vez.

### Espaço

```text
O(n)
```

No pior caso, todos os elementos serão armazenados no mapa.

---

## Resultado

A solução consegue identificar duplicados de forma eficiente, evitando comparações desnecessárias entre todos os elementos do array e reduzindo significativamente o custo da operação em coleções grandes de dados.