<?php
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $novaSenha = $_POST['nova_senha'] ?? '';

    if (!empty($email) && !empty($novaSenha)) {
        $hashSenha = password_hash($novaSenha, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios SET senha = :senha WHERE email = :email";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute(['senha' => $hashSenha, 'email' => $email]);
            echo "Senha redefinida com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao redefinir senha: " . $e->getMessage();
        }
    } else {
        echo "Preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>

<body>
    <header>
        <nav>
            <h1><a href="index.html">World Tour</a></h1>
            <div class="menu">
                <a href="login.php" class="btn">Login</a>
            </div>

        </nav>
    </header>
    <div class="container">
        <form method="post" class="login">
            <input type="text" name="nome" placeholder="Nome">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" id="senha" name="senha" required>
            <input type="password" id="novasenha" name="novasenha" required onblur="novaSenha()">
            <p id="alert"></p>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <footer>
        <p>&copy;2024. Flávio Ricardo.</p>
    </footer>

</body>

</html>