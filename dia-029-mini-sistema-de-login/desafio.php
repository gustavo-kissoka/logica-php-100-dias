<?php
/**
 * Dia 29 - Mini Sistema de Login (CLI)
 * Simula autenticação de utilizador utilizando arrays associativos.
 */
echo "====== Mini Sistema de Login (CLI) =======\n";
echo "Usuário: ";
$usuarioDigitado = strtolower(trim(fgets(STDIN)));

echo "Senha: ";
$senhaDigitada = trim(fgets(STDIN));

$usuarios =  [
    "admin" => [
        "nome" => "gustavo",
        "senha" => "123456"
    ]
];

function autenticar($usuarioDigitado, $senhaDigitada, $usuarios) {

    if (!isset($usuarios[$usuarioDigitado])) return "Usuário não encontrado";

    // se passar a primeira armazena o dado
    $dadosUsuario = $usuarios[$usuarioDigitado];

    if ($senhaDigitada !== $dadosUsuario["senha"]) return "Senha incorreta";

    return "Bem-vindo, {$dadosUsuario["nome"]}.";
}

echo autenticar($usuarioDigitado, $senhaDigitada, $usuarios);

?>