# 📦 Dia 58 — Sistema de Produtos

Projeto desenvolvido durante o meu desafio de **100 Dias de PHP**, com o objetivo de praticar operações CRUD utilizando **PHP**, **MySQL** e **PDO**.

Este sistema permite gerir um pequeno inventário de produtos através de uma interface simples e organizada.

---

## Funcionalidades

- Adicionar produtos
- Editar produtos
- Remover produtos
- Pesquisar por nome ou categoria
- Listar todos os produtos
- Estatísticas do inventário
  - Total de produtos
  - Produtos em stock
  - Produtos sem stock
  - Valor total do inventário

---

## Tecnologias utilizadas

- PHP
- MySQL
- PDO
- HTML5
- CSS3
- JavaScript

---

## Estrutura do projeto

```
Sistema-de-Produtos/
│
├── assets/
│   ├── style.css
│   └── script.js
│
├── config/
│   └── database.php
│
├── includes/
│   └── funcoes.php
│
├── index.php
└── README.md
```

---

## Base de Dados

Tabela utilizada:

```
produtos
```

Campos:

- id
- nome
- quantidade
- preco
- categoria

---

## O que pratiquei

Durante este projeto pratiquei:

- CRUD completo
- Prepared Statements
- Organização do código em funções
- Pesquisa utilizando `LIKE`
- Estatísticas com SQL (`COUNT`, `SUM`)
- Validação de dados no servidor
- Separação entre interface e lógica

---

## Segurança implementada

Antes de guardar ou editar qualquer produto são realizadas validações no servidor.

Algumas delas:

- Remoção de espaços com `trim()`
- Conversão de tipos (`intval()` e `floatval()`)
- Verificação de valores negativos
- Verificação de campos obrigatórios
- Utilização de Prepared Statements para evitar SQL Injection

O projeto **não confia apenas nas validações do HTML**, pois qualquer utilizador pode alterar os dados enviados ao servidor.

---

## Melhorias futuras

Algumas ideias para evoluir este projeto:

- Upload de imagem do produto
- Sistema de categorias separado em outra tabela
- Paginação
- Ordenação por preço ou nome
- Filtros avançados
- Histórico de movimentação de stock
- Dashboard com gráficos

---

# Desafios para quem utilizar este código

Este projeto foi desenvolvido com foco em aprendizagem.

Algumas melhorias ficaram de propósito para incentivar quem estudar este repositório a implementar as próprias soluções.

Algumas ideias:

- Validar tamanho mínimo e máximo do nome do produto.
- Criar uma função única responsável pela validação dos dados.
- Implementar mensagens de sucesso e erro.
- Verificar se o ID realmente existe antes de editar ou remover.
- Criar uma função `buscarProdutoPorId()`.
- Adicionar paginação quando houver muitos produtos.
- Criar filtros por categoria.
- Permitir ordenar por nome, preço ou quantidade.
- Implementar confirmação visual após operações CRUD.

A ideia não é fornecer um sistema perfeito, mas sim um projeto que sirva de base para novos estudos.

** Em alguns projetos anteriores exitem também desafios para quem utiliza o meu código "escondidos". **
---

## Objetivo deste desafio

Este projeto faz parte do meu desafio pessoal de estudar **PHP durante 100 dias**, desenvolvendo aplicações diferentes para praticar programação, organização de código e resolução de problemas reais.

Cada projeto procura ensinar um conceito novo em vez de apenas repetir o mesmo CRUD.

---

## Licença

Projeto desenvolvido apenas para fins de estudo.