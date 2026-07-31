<?php
require_once 'includes/auth.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - Bem-vindo</title>
    <link rel="stylesheet" href="assets/pagina-inicial.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <main class="welcome-card">
        <div class="user-avatar">
            <svg viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </div>

        <div class="welcome-text">
            <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></h1>
            <p>Você entrou.</p>
        </div>

        
        <form action="logout.php" method="POST" class="logout-form">
            <button type="submit" class="btn-logout">
                <svg viewBox="0 0 24 24">
                    <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                </svg>
                Sair
            </button>
        </form>
    </main>

</body>
</html>