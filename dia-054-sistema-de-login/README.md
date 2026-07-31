# Sistema de Login em PHP

Sistema de autenticação desenvolvido em **PHP + MySQL**, com foco em boas práticas de organização, segurança e reutilização de código.

Este projeto foi criado como parte do meu desafio diário de programação, com o objetivo de compreender o funcionamento de um sistema de login real utilizando PHP.

## Funcionalidades

* Registo de utilizadores
* Login com autenticação
* Logout
* Sessões (`$_SESSION`)
* Proteção de palavras-passe com `password_hash()`
* Verificação de palavras-passe com `password_verify()`
* Validação de email
* Verificação de utilizadores já registados
* Base de dados MySQL
* Consultas utilizando Prepared Statements (PDO)

## Tecnologias utilizadas

* PHP
* MySQL
* HTML5
* CSS3
* JavaScript (Alguns scripts nos echos)
* PDO

## Estrutura do projeto

```text
config/
│── database.php

includes/
│── funcoes.php
│── auth.php

assets/
│── style.css
│── pagina-inicial.css

login-register.php
pagina-inicial.php
logout.php
```

## Conceitos praticados

* Organização de projetos PHP
* Separação de responsabilidades
* CRUD com base de dados MySQL
* Sessões
* Autenticação de utilizadores
* Segurança básica em aplicações web
* Prepared Statements
* Hash de palavras-passe
* Estruturação de funções reutilizáveis

## Melhorias futuras

* Recuperação de palavra-passe
* Confirmação de palavra-passe durante o registo
* Mensagens de sucesso e erro mais intuitivas
* Validação completa no lado do cliente (JavaScript)
* Proteção contra CSRF
* Painel de administração
* Perfis de utilizador
* Sistema "Lembrar-me"
* Edição do perfil do utilizador

## Objetivo do desafio

Este projeto faz parte do meu desafio de **100 dias de PHP**, onde procuro evoluir continuamente em lógica de programação, desenvolvimento web e boas práticas de programação.

O principal objetivo deste desafio foi aprender a construir um sistema de autenticação completo utilizando **PHP + MySQL**, compreendendo o funcionamento de sessões, segurança de palavras-passe, organização do código e interação com bases de dados relacionais.
