# Dia 43 — Simular Cache Simples

## Descrição

Neste desafio, foi implementado um sistema simples de cache para evitar buscas repetidas de dados.

A ideia é verificar se uma informação já foi armazenada anteriormente. Caso exista, o sistema retorna o valor diretamente do cache. Caso contrário, realiza a busca, armazena o resultado no cache e o devolve ao utilizador.

Este conceito é amplamente utilizado em aplicações web, APIs, bancos de dados e sistemas distribuídos para melhorar o desempenho.

---

## Lógica Aplicada

O cache foi implementado utilizando um array associativo (HashMap).

### Funcionamento

1. Receber uma chave de busca.
2. Verificar se a chave já existe no cache utilizando `isset()`.
3. Se existir:
   - Retornar o valor armazenado.
   - Registrar um **Cache HIT**.
4. Se não existir:
   - Simular uma busca demorada.
   - Armazenar o resultado no cache.
   - Retornar o valor encontrado.
   - Registrar um **Cache MISS**.

### Exemplo

Primeira chamada:

```text
[CACHE MISS] Buscando dados...
Dados do usuário gustavo
```

Segunda chamada:

```text
[CACHE HIT] Dados encontrados na cache
Dados do usuário gustavo
```

---