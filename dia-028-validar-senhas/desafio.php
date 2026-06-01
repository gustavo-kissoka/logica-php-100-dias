<?php
function validarSenha($senha) {

    $tamanhoMinimo = strlen($senha) >= 8;
    $maiusculas = preg_match('/[A-Z]/', $senha);
    $minusculas = preg_match('/[a-z]/', $senha);
    $numeros = preg_match('/[0-9]/', $senha);
    $especial = preg_match('/[^a-zA-Z0-9]/', $senha);
 
    
    if (!$tamanhoMinimo) return "Erro: A senha deve ter pelo menos 8 caracteres.";
    if (!$maiusculas) return "Erro: A senha deve conter pelo menos uma letra maiúscula.";
    if (!$minusculas) return "Erro: A senha deve conter pelo menos uma letra minúscula.";
    if (!$numeros) return "Erro: A senha deve conter pelo menos um número.";
    if (!$especial) return "Erro: A senha deve conter pelo menos um caractere especial.";

    return "Senha válida e segura!";
}   

$senha1 = "12345678"; // senha fraca 
$senha2 = "123456789"; // senha fraca
$senha3 = "123456789a"; // senha fraca
$senha4 = "123456789A"; // senha fraca
$senha5 = "123456789Aa"; // senha fraca
// senha forte
$senha6 = "123456789Aa!";
$resultado = validarSenha($senha5);
echo $resultado;
?>
