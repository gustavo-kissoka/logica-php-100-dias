# Dia 55 — Sistema de Lista de Tarefas (To-Do)

Projeto desenvolvido como parte do meu desafio de **100 Dias de PHP**, com o objetivo de praticar operações **CRUD** utilizando **PHP, MySQL e HTML**.

Neste projeto foi construída uma aplicação web para gestão de tarefas, permitindo criar, editar, concluir e remover tarefas através de uma interface simples e organizada.

---

## Tecnologias utilizadas

- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- PDO

---

## Funcionalidades

- Criar novas tarefas
- Listar todas as tarefas
- Editar tarefas existentes
- Marcar tarefas como concluídas
- Remover tarefas
- Interface web responsiva
- Utilização de modais para cadastro e edição

---

## Estrutura do projeto

```
dia-055-lista-de-tarefas/
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
│
└── README.md
```

---

## Conceitos praticados

- CRUD com MySQL
- Conexão com banco de dados utilizando PDO
- Prepared Statements
- Organização do projeto em camadas
- Separação entre lógica e apresentação
- Manipulação de formulários HTML
- Métodos GET e POST
- Atualização de registros no banco de dados
- Exclusão de registros
- Boas práticas de organização de código

---

## Base de Dados

Tabela utilizada:

```sql
tarefas
```

Campos principais:

- id
- titulo
- descricao
- status
- criado_em

---

## O que aprendi

Durante este desafio pratiquei a construção de um CRUD completo utilizando MySQL.

Também consolidei conhecimentos sobre:

- Estruturação de projetos PHP
- Organização do código em ficheiros separados
- Reutilização de funções
- Comunicação entre HTML e PHP
- Manipulação de dados persistidos em banco de dados

---

## Objetivo do desafio

Este projeto faz parte do meu desafio pessoal de **100 Dias de PHP**, onde desenvolvo aplicações progressivamente mais completas para fortalecer minha lógica de programação, organização de código e desenvolvimento web.

---

Desenvolvido por **Gustavo** durante o desafio **100 Dias de PHP**.