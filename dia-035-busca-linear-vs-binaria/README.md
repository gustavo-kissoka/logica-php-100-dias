# Dia 35 Busca Linear vs Binária

## Descrição

- Busca Linear: O(n) -- mais lenta
- Busca Binária: O(log n) -- mais rápida

## Busca Linear

- Percorre cada elemento da lista até encontrar o alvo ou chegar ao fim.
- O(n)

## Busca Binária

- Divide a lista em metades e compara o alvo com o elemento do meio.
- Se o alvo for menor que o elemento do meio, busca na metade esquerda.
- Se o alvo for maior que o elemento do meio, busca na metade direita.
- O(log n)

## Lógica

* criar 2 funções uma para a busca linear e outra para a busca binária, onde recebera uma lista e um alvo, e retornara o indice do alvo ou -1 caso nao encontre o alvo na lista
* na busca linear, percorre a lista (elemento por elemento) e compara o alvo, se o alvo for igual ao elemento, retorna o indice, se nao, retorna -1
* na busca binária, divide a lista em 2 metades, se o alvo for menor que o elemento do meio, busca na metade esquerda, se nao, busca na metade direita -- lembrando que a busca binaria precisa que o array esteja ordenado de forma crescente. 

