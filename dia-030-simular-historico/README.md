# Dia 30 Simular um histórico (undo/redo)

## Descrição

Este programa tem como objectivo armazenar ações que permita: 

* Adicionar ações
* Desfazer a última ação
* Refazer ação desfeita

### Exemplo: 
#### Entrada
```php 
Olá 
Mundo

// undo (ctrl + z)
Olá 

// redo (ctrl + y)
Olá 
Mundo
```

## Lógica

* 2 Pilha (Stack) -- mesmo conceito aplicado em Parênteses válidos array_push() e array_pop()
* Guard clause 
* & - referência nos parâmetros das funções para usar sempre os valores originais 
