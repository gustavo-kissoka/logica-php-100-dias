<?php

$caracteres =  trim(fgets(STDIN));

$pilha = [];
$pares = [
    "(" => ")",
    "{" => "}",
    "[" => "]"
];

for ($i = 0; $i < strlen($caracteres); $i++) {
    if ($caracteres[$i] == "(" || $caracteres[$i] == "{" || $caracteres[$i] == "[") {
        array_push($pilha, $caracteres[$i]);
    }elseif ($caracteres[$i] == ")" || $caracteres[$i] == "}" || $caracteres[$i] == "]") {

       if (empty($pilha)) {
        echo "Nao sao parenteses validos";
        exit;
    }

        $ultimo = array_pop($pilha);
        if ($pares[$ultimo] != $caracteres[$i]) {
            echo "Nao sao parenteses validos";
            exit;
        }
    }
}


if (empty($pilha)) {
    echo "São parenteses validos";
}else {
    echo "Nao sao parenteses validos";
}

?>