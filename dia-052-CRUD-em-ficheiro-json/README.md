#  Sistema de Gestão de Livros (CRUD com JSON) continuando do dia 51

Sistema desenvolvido em **PHP (CLI)** que implementa um **CRUD completo** com persistência de dados utilizando um ficheiro **JSON**.

Este projeto é a evolução do desafio anterior (CRUD em memória), substituindo o armazenamento temporário por um ficheiro JSON, permitindo que os dados permaneçam guardados mesmo após o encerramento da aplicação.

---

## 🚀 Funcionalidades

* ➕ Adicionar livros
* 📖 Listar livros
* ✏️ Editar livros
* ❌ Remover livros
* 🔍 Pesquisar livros por título
* 💾 Guardar automaticamente os dados em ficheiro JSON
* 📂 Carregar automaticamente os dados ao iniciar o sistema

---

##  Tecnologias

* PHP (CLI)
* JSON

---

##  Como executar

Execute o projeto através do terminal:

```bash
php sistema_livros.php
```

O sistema criará automaticamente o ficheiro `biblioteca.json` caso ele ainda não exista.

---

## Conceitos praticados

* CRUD (Create, Read, Update, Delete)
* Persistência de dados
* Manipulação de ficheiros
* JSON (`json_encode()` e `json_decode()`)
* `file_get_contents()`
* `file_put_contents()`
* `file_exists()`
* Arrays associativos
* Organização por responsabilidades
* Pesquisa por ID e por título
* Validação de dados

---

## 🏛️ Arquitetura

O projeto foi dividido em camadas para facilitar a organização do código.

### 🔹 Funções auxiliares

Responsáveis pelo carregamento e gravação dos dados no ficheiro JSON.

### 🔹 Camada CRUD

Contém toda a lógica de manipulação dos livros.

* Adicionar
* Editar
* Remover
* Listar
* Pesquisar

### 🔹 Camada CLI

Responsável pela interação com o utilizador através do terminal.

### 🔹 Execução

Inicializa o sistema e controla o menu principal.

---

## 📂 Estrutura do projeto

```text
📁 projeto
│
├── sistema_livros.php
├── biblioteca.json
└── README.md
```

---

## Melhorias futuras

* Persistência utilizando MySQL
* Ordenação por título, autor ou ano
* Pesquisa por autor
* Validação para impedir livros duplicados
* Exportação dos livros para CSV
* Importação de ficheiros JSON
* Interface gráfica ou versão Web

---

## Objetivo

Este projeto faz parte do meu desafio **PHP 100 Dias**, cujo objetivo é evoluir na lógica de programação, aprender boas práticas de organização de código e construir aplicações cada vez mais próximas de sistemas reais.

---

## 💡 O que aprendi

Este foi um dos desafios mais importantes até agora.

Além de implementar um CRUD completo, aprendi como armazenar dados de forma persistente utilizando ficheiros JSON, compreendendo melhor o funcionamento da leitura e escrita de ficheiros em PHP.

Também pratiquei a divisão de responsabilidades do sistema, separando a lógica da aplicação da forma como os dados são armazenados.
