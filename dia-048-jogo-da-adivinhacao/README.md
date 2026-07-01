# Dia 48 — Jogo da Adivinhação

## Descrição

Neste desafio, foi desenvolvido um jogo de adivinhação em modo CLI (terminal), onde o computador gera um número aleatório entre 1 e 100 e o utilizador tem um número limitado de tentativas para acertá-lo.

Após cada tentativa, o programa informa se o número secreto é maior ou menor. Ao final, o jogador pode optar por iniciar uma nova partida.

---

## Lógica Aplicada

1. Gerar um número aleatório entre 1 e 100.
2. Definir a quantidade de tentativas disponíveis.
3. Ler o palpite do utilizador.
4. Validar se o valor informado está entre 1 e 100.
5. Comparar o palpite com o número secreto.
6. Informar se o número secreto é maior, menor ou se o utilizador acertou.
7. Encerrar o jogo ao acertar ou quando as tentativas terminarem.
8. Perguntar ao utilizador se deseja jogar novamente.

---

## Conceitos Utilizados

- Funções
- Loops (`while`)
- Estruturas condicionais (`if/elseif/else`)
- Entrada de dados (`fgets`)
- Geração de números aleatórios (`rand`)
- Validação de dados
- Contadores
- Recursão