# 📚 Dia 57 — Sistema de Notas Escolares

Projeto desenvolvido durante o desafio **100 Dias de PHP**.

Este sistema permite gerir alunos e respetivas notas utilizando **PHP**, **MySQL** e **PDO**, simulando um pequeno sistema escolar.

---

## Objetivos do desafio

Neste projeto foram praticados vários conceitos importantes:

- CRUD completo
- Relacionamento entre tabelas
- INNER JOIN
- Chaves estrangeiras
- ON DELETE CASCADE
- Transações (Transaction)
- Dashboard com estatísticas
- Pesquisa de alunos
- Cálculo automático de média
- Cálculo automático da situação do aluno

---

## Funcionalidades

- Cadastrar alunos
- Cadastrar notas
- Editar alunos e notas
- Eliminar alunos
- Pesquisa por nome
- Dashboard com estatísticas
- Média automática
- Situação automática (Aprovado/Reprovado)

---

## Tecnologias utilizadas

- PHP
- MySQL
- HTML
- CSS
- JavaScript
- PDO

---

## Estrutura da Base de Dados

### Tabela `alunos`

| Campo | Tipo |
|--------|------|
| aluno_id | INT |
| nome | VARCHAR |
| turma | VARCHAR |
| criado | DATETIME |

---

### Tabela `notas`

| Campo | Tipo |
|--------|------|
| id | INT |
| aluno_id | INT |
| disciplina | VARCHAR |
| nota1 | DECIMAL |
| nota2 | DECIMAL |
| media | DECIMAL |
| situacao | VARCHAR |

Relacionamento:

```
alunos (1)
      |
      |
      +------< notas (N)
```

Foi utilizada uma **Foreign Key** com:

```
ON DELETE CASCADE
```

Assim, ao remover um aluno, todas as suas notas são removidas automaticamente.

---

## Conceitos praticados

### INNER JOIN

Para listar alunos juntamente com as respetivas notas foi utilizado:

```sql
INNER JOIN notas
ON alunos.aluno_id = notas.aluno_id
```

---

### Transações

O cadastro de alunos envolve duas tabelas diferentes.

Primeiro:

- inserir aluno

Depois:

- inserir nota

Caso alguma operação falhe, nenhuma alteração é guardada.

```php
$pdo->beginTransaction();

...

$pdo->commit();

...

$pdo->rollBack();
```

Isto garante integridade dos dados.

---

### lastInsertId()

Após criar o aluno, foi utilizado:

```php
$pdo->lastInsertId()
```

para obter o ID recém-criado e associá-lo às notas.

---

### Dashboard

O sistema apresenta:

- Total de alunos
- Total de aprovados
- Total de reprovados
- Média geral

Todas as estatísticas são obtidas diretamente através de consultas SQL.

---

## Organização do projeto

```
config/
    database.php

includes/
    funcoes.php

assets/
    style.css
    script.js

index.php
README.md
```

---

## O que aprendi

Durante este desafio pratiquei conceitos bastante importantes para aplicações reais:

- Relacionamento entre tabelas
- Chaves estrangeiras
- Transações
- Consultas com JOIN
- Dashboard
- Organização do código
- Separação entre interface e regras de negócio

Foi o meu primeiro projeto utilizando várias tabelas relacionadas entre si.

---

## Melhorias futuras

- Sistema de professores
- Sistema de disciplinas
- Notas por trimestre
- Login para professores
- Histórico escolar
- Exportação para PDF
- Paginação
- Filtros avançados
- Upload de fotografia do aluno

---

## Erros clássicos

Durante projetos deste tipo é comum cometer alguns erros.

### Esquecer Transaction

Sem transações pode acontecer:

- aluno ser criado
- nota não ser criada

ficando dados inconsistentes.

---

### Não utilizar Foreign Keys

Sem relacionamento entre tabelas podem existir notas pertencentes a alunos inexistentes.

---

### Não utilizar ON DELETE CASCADE

Ao remover um aluno, as notas podem permanecer na base de dados.

---

### Não usar Prepared Statements

Nunca concatenar valores diretamente na SQL.

Errado:

```php
$sql = "SELECT * FROM alunos WHERE nome='$nome'";
```

Correto:

```php
$stmt = $pdo->prepare(...);
```

---

### Calcular a média apenas no HTML

A média deve ser calculada no servidor para garantir consistência.

---

### Repetir SQL

Criar funções específicas para cada operação facilita manutenção e reutilização do código.

---

## Desafio concluído

✔ Dia 57 do desafio **100 Dias de PHP**.