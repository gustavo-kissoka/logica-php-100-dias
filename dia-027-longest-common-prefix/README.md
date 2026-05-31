# Dia 27 longest common prefix (LeetCode)

# Descriação 

 Este programa recebe um array de string e deve encontrar o maior prefixo comum entre todas elas.

## O que é prefixo? 

São partes de palavras (morfemas) adicionadas no início de um radical, ou sejá. Simplesmente o começo da palavra.

# Lógica

* verificar se o array está vazio usando uma condição e a função empty()
* Iniciar o prefixo na primeira palavra strs[0] na primeira letra
* um loop para percorrer letra por letra
* Usei funções como strpos() => para encontrar a posição se for diferente de 0, o substr() => usado para retornar uma parte da string até
encontrar um prefixo válido substr($prefix, 0, -1);

## Exemplo

### Entrada
```php
$array = ["flower", "flow", "flight"]
```
### Saída 
```php
fl
```
