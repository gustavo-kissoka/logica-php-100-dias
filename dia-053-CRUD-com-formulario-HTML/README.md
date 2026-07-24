# 📚 Dia 53 — CRUD com Formulário HTML

## Descrição

Neste desafio, o objetivo foi evoluir o sistema CRUD de livros desenvolvido anteriormente em PHP para uma interface web utilizando **HTML, CSS e PHP**.

A lógica do sistema foi mantida praticamente a mesma do desafio anterior (CRUD com ficheiro JSON), alterando apenas a camada de apresentação. Em vez da interação pelo terminal (CLI), o utilizador passa a gerir os livros através de uma interface gráfica com formulários HTML.

Os dados continuam a ser armazenados num ficheiro **JSON**, funcionando como uma pequena base de dados.

---

## Funcionalidades

* Adicionar novos livros
* Listar livros
* Editar livros
* Remover livros
* Pesquisar livros por título
* Persistência de dados em ficheiro `.json`
* Interface responsiva com HTML e CSS
* Modais para adicionar e editar livros

---

## Tecnologias utilizadas

* PHP
* HTML5
* CSS3
* JavaScript
* JSON

---

## Conceitos praticados

* Integração entre PHP e HTML
* Formulários HTML (`GET` e `POST`)
* Manipulação de ficheiros JSON
* Reutilização de código
* Separação de responsabilidades
* Geração dinâmica de HTML com PHP
* Estruturas condicionais e loops
* Organização de funções
* Manipulação de arrays

---

## Estrutura do projeto

```text
📂 projeto
│
├── index.php
├── desafio_funcoes.php
├── biblioteca.json
│
├── assets/
│   ├── style.css
│   └── script.js
│
└── README.md
```

---

## O que aprendi

Este desafio mostrou como reutilizar a lógica de um sistema desenvolvido para terminal numa aplicação web.

Também permitiu compreender melhor:

* Como o PHP recebe dados enviados por formulários.
* A diferença entre os métodos **GET** e **POST**.
* Como gerar tabelas HTML dinamicamente através do PHP.
* Como integrar JavaScript para melhorar a experiência da interface.
* A importância de separar a lógica da aplicação da interface.

Foi um dos desafios que mais exigiu adaptação, pois envolveu a integração de vários conceitos novos ao mesmo tempo.

---

## Melhorias futuras

* Confirmação antes de remover um livro.
* Validação mais completa dos formulários.
* Mensagens de sucesso e erro para o utilizador.
* Ordenação por título, autor ou ano.
* Paginação da tabela.
* Pesquisa em tempo real.
* Migração da persistência em JSON para MySQL.
* Implementação de autenticação de utilizadores.

---

## Conclusão

Este desafio representou a transição de uma aplicação em linha de comandos para uma aplicação web simples, mantendo a mesma lógica de negócio. Além de consolidar os conhecimentos de PHP, também reforçou a importância da reutilização de código, da organização do projeto e da separação entre interface e lógica da aplicação.
