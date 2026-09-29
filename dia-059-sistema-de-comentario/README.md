# 💬 Sistema de Comentários — PHP + MySQL

Projeto desenvolvido durante o **Desafio PHP 100 Dias**.

O objetivo deste projeto foi criar um sistema de comentários utilizando **PHP e MySQL**, permitindo que utilizadores possam adicionar, visualizar e gerir comentários de forma persistente através de uma base de dados.

---

## 🚀 Funcionalidades

* ✅ Adicionar comentários
* ✅ Listar comentários existentes
* ✅ Guardar comentários numa base de dados MySQL
* ✅ Editar comentários
* ✅ Remover comentários
* ✅ Comunicação entre PHP e MySQL
* ✅ Validação dos dados recebidos

---

## 🛠️ Tecnologias utilizadas

* PHP
* MySQL
* HTML5
* CSS3
* SQL
* XAMPP (ambiente de desenvolvimento)

---

## 📚 Conceitos praticados

Durante o desenvolvimento deste projeto foram praticados conceitos importantes:

### PHP

* Manipulação de formulários
* Receção de dados com `POST`
* Organização de funções
* Separação de responsabilidades

### MySQL

* Criação de tabelas
* Inserção de dados (`INSERT`)
* Consulta de dados (`SELECT`)
* Atualização de dados (`UPDATE`)
* Remoção de dados (`DELETE`)

### Segurança e boas práticas

* Validação de entradas
* Uso de prepared statements para evitar SQL Injection
* Organização do código para facilitar manutenção

---

## 🗄️ Estrutura da Base de Dados

Tabela principal:

### `comentarios`

| Campo      | Tipo     | Descrição              |
| ---------- | -------- | ---------------------- |
| id         | INT      | Identificador único    |
| nome       | VARCHAR  | Nome do utilizador     |
| comentario | VARCHAR  | Conteúdo do comentário |
| criado     | DATETIME | Data de criação        |

---

## 📂 Estrutura do Projeto

Exemplo:

```
Sistema-de-Comentarios/
│
├── index.php
│
├── config/
│   └── database.php
│
├── assets/
│   ├── style.css
│   └── script.js
│
└── include/
    └── funcoes.php
```
---

## 🔮 Próximas melhorias possíveis

Algumas melhorias futuras:

* Sistema de login para identificar autores dos comentários.
* Respostas aos comentários.
* Likes/dislikes.
* Paginação de comentários.
* Sistema de moderação para administradores.
* Upload de imagens de perfil.
* Sistema de notificação para novos comentários.
* Apenas quem for autor do comentário pode editar ou remover o mesmo.

