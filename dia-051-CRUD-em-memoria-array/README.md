# 📚 Sistema de Gestão de Livros (CRUD em Memória)

Um sistema de gestão de livros desenvolvido em **PHP (CLI)** utilizando um **CRUD completo em memória**, onde os dados são armazenados em arrays durante a execução do programa.

## 🚀 Funcionalidades

* Adicionar livros
* Listar livros
* Editar informações de um livro
* Remover livros
* Pesquisar livros pelo título
* Menu interativo em linha de comandos (CLI)

## 🛠️ Tecnologias

* PHP
* Terminal (CLI)

## ▶️ Como executar

Certifique-se de ter o PHP instalado e execute:

```bash
php sistema_livros.php
```

## 📚 Conceitos praticados

* CRUD (Create, Read, Update, Delete)
* Arrays associativos
* Manipulação de arrays
* Funções
* Organização por responsabilidades
* Validação de dados
* Pesquisa por ID e por título
* Busca parcial utilizando `strpos()`

## 🏛️ Arquitetura

O projeto foi organizado em diferentes responsabilidades:

* **Camada de dados (CRUD):** responsável pelas operações sobre os livros.
* **Funções utilitárias:** reutilização de pesquisas e exibição de informações.
* **Camada CLI:** interação com o utilizador.
* **Função principal:** responsável pelo menu e fluxo da aplicação.

Essa organização torna o código mais limpo, reutilizável e fácil de manter.

## 🔮 Melhorias futuras

* Persistência dos dados em ficheiros JSON
* Integração com base de dados MySQL
* Ordenação por título ou ano
* Validação para impedir livros duplicados
* Pesquisa por autor
* Interface gráfica ou versão web
* Paginação para grandes quantidades de livros

## 🎯 Objetivo

Este projeto faz parte do desafio **PHP 100 Dias**, com foco no desenvolvimento da lógica de programação, organização de código e construção de aplicações utilizando PHP.

## Autor

[gustavo-kissoka](https://github.com/gustavo-kissoka)

