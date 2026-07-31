<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
// porque e quando usar o require_once
// é usada para incluir arquivos com segurança absoluta e evitar duplicatas em seus projetos PHP
// o __DIR__ É uma constante que retorna o caminho absoluto do diretório atual
require_once __DIR__ . '/config/database.php'; // chama o ficheiro de conexão
require_once __DIR__ . '/includes/funcoes.php'; // chama o ficheiro de funções

$pdo = conectarBD(); // cria a conexão com o banco de dados
$mensagemDeErro  = '';

// PARA O FORMULARIO DE REGISTRO 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) { // verifica se o formulario foi enviado
  if ($_POST['acao'] === 'registro') { // verifica qual formulario foi enviado
    $nome = trim($_POST['name'] ?? ''); // a função trim remove os espaços em branco no inicio e no fim da string
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    // validação simples de email 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $mensagemDeErro = "Formato de email inválido.";
    } elseif (strlen($senha) < 8) {
      $mensagemDeErro = "A senha deve ter pelo menos 8 caracteres.";
    } else {
      // chama a função do ficheiro funcoes.php para cadastrar o usuário
      $resultado = cadastrarUsuario($pdo, $email, $nome, $senha);

      if ($resultado === true) {
        echo "<script>alert('Registo efetuado com sucesso!');</script>";
      } else {
        $mensagemDeErro = $resultado;
      }
    }
  }
  // PARA O FORMULARIO DE LOGIN 
  if ($_POST['acao'] === 'login') {
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (fazerLogin($pdo, $email, $senha)) {
      header('Location: pagina-inicial.php');
      exit;
    } else {
      $mensagemDeErro = "Email ou senha incorretos.";
    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Logins</title>
  <link rel="stylesheet" href="assets/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600&family=Poppins:wght@400;500;600&display=swap"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
</head>

<body>
  <?php if ($mensagemDeErro) : ?>
    <div class="mensagem-erro">
      <?php echo htmlspecialchars($mensagemDeErro); ?>
    </div>
  <?php endif; ?>
  
  <div class="card">
    <input type="checkbox" id="toggle" class="toggle" />
    <div class="card-bg"></div>
    <div class="hero signup">
      <h2>Welcome Back!</h2>
      <p>Sign in to review your latest profit from investments.</p>
      <label for="toggle">SIGN IN</label>
    </div>
    <div class="form signup">
      <h2>Create Account</h2>
      <div class="sso">
        <a class="fa-brands fa-facebook"></a>
        <a class="fa-brands fa-twitter"></a>
        <a class="fa-brands fa-linkedin"></a>
      </div>
      <p>Or use your email address</p>
      <form method="POST" action="login-register.php">
        <input type="text" name="name" placeholder="Full name" />
        <input type="email" name="email" placeholder="Email address" />
        <input type="password" name="senha" placeholder="Password" />
        <!--input escondido para saber qual formulario foi enviado-->
        <input type="hidden" name="acao" value="registro">
        <button>SIGN UP</button>
      </form>
    </div>
    <div class="hero signin">
      <h2>Hey There!</h2>
      <p>Begin your journey using this software, and start earning now.</p>
      <label for="toggle">SIGN UP</label>
    </div>
    <div class="form signin">
      <h2>Sign In</h2>
      <div class="sso">
        <a class="fa-brands fa-facebook"></a>
        <a class="fa-brands fa-twitter"></a>
        <a class="fa-brands fa-linkedin"></a>
      </div>
      <p>Or use your email address</p>
      <form method="POST" action="login-register.php">
        <input type="email" name="email" placeholder="Email address" />
        <input type="password" name="senha" placeholder="Password" />
        <input type="hidden" name="acao" value="login">
        <a>Forgot password?</a>
        <button>SIGN IN</button>
      </form>
    </div>
  </div>
</body>
</html>