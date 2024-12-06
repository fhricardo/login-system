<?php
require 'conn.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty($email) && !empty($senha)) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario'] = $usuario['nome'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "E-mail ou senha inválidos!";
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
            <input type="email" name="email" id="email" placeholder="Digite seu e-mail">
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
            <a href="esqueci.php">Esqueci minha senha</a>
            <input type="submit" value="Login">
            <p>Ainda não tem cadastro?</p>
            <a href="cadastro.php">Clique aqui!</a>
        </form>
    </div>

    <footer>
        <p>&copy;2024. Flávio Ricardo.</p>
    </footer>
</body>

</html>