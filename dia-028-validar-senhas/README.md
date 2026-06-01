# Dia 28 validar senhas (Regras míltiplas)

## Descrição 

Este desafio está mais proximo dos problemas reais de backend. O objectivo é criar uma função que valide 
uma senha segundo várias regras.

## Exemplos
### Senha válida:
```php
Abc12345!
```

### Senha inválida
```php
abc123
```
Muito curta.

## Regras

* Ter pelo menos 8 caracteres
* Ter pelo menos 1 letra minúscula
* Ter pelo menos 1 letra maiúscula
* Ter pelo menos 1 número
* Ter pelo menos 1 caractere especial

## Lógica

   Focada em deixar o código mais simples e fácil de ler.

* Usei expressões regulares (regex) preg_match
* em vez de usar blocos de if/else usei um padrão chamado "guard clauses", focando no erro e na facilidade de leitura.
  
