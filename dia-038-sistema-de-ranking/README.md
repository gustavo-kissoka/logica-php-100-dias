# Dia 38 sistema de ranking 

## Descrição

Neste desafio, o objetivo foi criar um sistema de ranking de jogadores em um array associativo multidimensional.

Cada jogador possui:

- Nome
- Pontos

Foi implementada uma forma de ordenação:

1. Ordenação por pontos (do mais alto para o mais baixo).

## Lógica Utilizada

### Ordenação por Pontos

* Foi utilizada a função `usort()` do PHP juntamente com o operador *Spaceship* (`<=>`).

Exemplo:

```php
return $a['pontos'] <=> $b['pontos'];
```

* Foi criada 2 duas funções top3() e restantes() que retornam os 3 primeiros e os restantes jogadores respectivamente.

* Usei o array_slice() para retornar os 3 primeiros jogadores como também para retornar os restantes jogadores.

```php
return array_slice($jogadores, 0, 3);
```


