# Dia 40 — Grupo de Anagramas

## Descrição

Neste desafio, o objetivo foi agrupar palavras que são anagramas entre si.

Duas palavras são consideradas anagramas quando possuem as mesmas letras com a mesma quantidade, apenas em ordem diferente.

Exemplo:

```php
["amor", "roma", "arom"]
```

Todas pertencem ao mesmo grupo por possuírem as mesmas letras.

---

## Lógica Aplicada

Para cada palavra:

1. Separar as letras da palavra.
2. Ordenar as letras em ordem alfabética.
3. Transformar as letras novamente em uma string.
4. Utilizar essa string ordenada como chave de agrupamento em um HashMap.
5. Adicionar a palavra ao grupo correspondente.

Exemplo:

```text
amor -> amor
roma -> amor
arom -> amor
```

Como todas geram a mesma chave (`amor`), são armazenadas no mesmo grupo.

Ao final, os grupos de anagramas são retornados em um único array.
