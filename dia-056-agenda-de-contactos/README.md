# 📇 Agenda de Contactos

Uma aplicação web desenvolvida em PHP e MySQL para gerir contactos pessoais. O sistema permite adicionar, editar, pesquisar e remover contactos, além de suportar upload de fotografia para cada contacto.

Este projeto foi desenvolvido como parte do meu desafio de **100 Dias de PHP**, com foco em praticar CRUD completo, manipulação de ficheiros, upload de imagens e organização de projetos.

---

## Funcionalidades

- Adicionar novos contactos
- Editar contactos existentes
- Remover contactos
- Pesquisa por nome, telefone ou email
- Upload de fotografia
- Avatar padrão quando não existe fotografia (ou não)
- Interface moderna utilizando modais
- Dados armazenados em MySQL
- Código organizado por responsabilidades

---

## Tecnologias utilizadas

- PHP
- MySQL
- PDO
- HTML5
- CSS3
- JavaScript
- SQL

---

## Estrutura do Projeto

```
agenda-contactos/
│
├── assets/
│   ├── style.css
│   ├── script.js
│
│
├── config/
│   └── database.php
│
├── includes/
│   └── funcoes.php
│
├── uploads/
│
└── index.php
```

---

## Conceitos praticados

Durante este projeto foram praticados diversos conceitos importantes do desenvolvimento web.

### CRUD completo

- Create
- Read
- Update
- Delete

---

### Upload de imagens

Foi implementado o upload de fotografias utilizando:

- `$_FILES`
- `move_uploaded_file()`
- `pathinfo()`
- `uniqid()`
- `mkdir()`

Cada imagem recebe um nome único para evitar conflitos.

---

### Pesquisa dinâmica

Foi utilizada pesquisa utilizando SQL:

```sql
LIKE '%texto%'
```

permitindo procurar contactos por:

- Nome
- Telefone
- Email

---

### Segurança

Foram utilizados alguns cuidados básicos:

- Prepared Statements (PDO)
- `htmlspecialchars()`
- `trim()`
- Upload limitado a imagens
- Geração de nomes únicos para ficheiros

---

## Aprendizagens

Durante este desafio aprendi:

- Como funciona o upload de ficheiros em PHP.
- Como guardar o caminho da imagem na base de dados.
- Como criar automaticamente a pasta de uploads.
- Como pesquisar dados utilizando SQL.
- Como organizar melhor um projeto PHP.
- Como reutilizar funções entre diferentes projetos.

---

# Erros clássicos encontrados durante o desenvolvimento

Durante o desenvolvimento encontrei alguns erros interessantes que serviram como aprendizagem.

---

### 1. Não apagar imagens antigas

Ao remover um contacto, a fotografia continua na pasta `uploads`.

Isso cria ficheiros órfãos.

Uma melhoria futura será remover automaticamente a imagem antiga quando:

- um contacto for eliminado;
- uma fotografia for substituída.

---

### 2. Confiar apenas na validação HTML

Mesmo utilizando:

```html
<input type="email">
```

o PHP também deve validar os dados recebidos.

Nunca confiar apenas na validação do navegador.

---

### 3. Não validar uploads

Antes de aceitar um ficheiro é importante validar:

- extensão
- tipo
- tamanho

Neste projeto foi realizada validação das extensões permitidas.

---

## Melhorias futuras

- Paginação
- Ordenação por nome
- Favoritos
- Múltiplos números por contacto
- Eliminar automaticamente fotografias antigas
- Validação mais completa dos dados
- Confirmação personalizada antes de eliminar
- Sistema de autenticação para proteger a agenda

---

## O que este projeto treina

- Organização de projetos PHP
- CRUD utilizando MySQL
- Manipulação de formulários
- Upload de imagens
- Pesquisa utilizando SQL
- Separação de responsabilidades
- Programação estruturada
- Boas práticas com PDO

---

## Objetivo

Este projeto faz parte do meu desafio **100 Dias de PHP**, onde desenvolvo aplicações progressivamente mais completas para consolidar conhecimentos em PHP, MySQL e desenvolvimento web.

Cada projeto procura introduzir novos conceitos enquanto reforça os já aprendidos.