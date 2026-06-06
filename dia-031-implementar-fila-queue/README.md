# Dia 31 implementar fila queue

## Descrição:

Este programa implementa uma fila (queue) usando uma lista em Python. A fila é uma estrutura de dados que segue o princípio FIFO (First In, First Out), onde o primeiro elemento a ser adicionado é o primeiro a ser removido.

## Exemplos:
### Entrada e Saída:
```php
// fila: 
["Maria", "Gustavo", "Antonio", "Joaquim"] // FIFO

$atendido = dequeue($fila);
echo "Atendido: $atendido\n"; // saida: Atendido e também removido: Maria 

// fila atual ["Gustavo", "Antonio", "Joaquim"]

enqueue($fila, 'Pedro'); // adiciona Pedro na fila

echo "Fila atual: ";
print_r($fila); // fila atual ["Gustavo", "Antonio", "Joaquim", "Pedro"]

```

### Lógica:

* cria uma fila com alguns nomes
* criar 3 funções enqueue(), dequeue() e front() -> enqueue adiciona um nome na fila, dequeue remove um nome da fila e front mostra a fila atual
* remove um nome da fila usando a função em php array_shift() -> remove o primeiro elemento da fila
* adiciona um nome na fila usando a função em php array_push() -> adiciona um elemento na fila em último lugar
* função para exibir a fila atual usando a função print_r() 