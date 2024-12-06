<?php
require 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty($nome) && !empty($email) && !empty($senha)) {
        $hashSenha = password_hash($senha, PASSWORD_DEFAULT); // Hash da senha

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute(['nome' => $nome, 'email' => $email, 'senha' => $hashSenha]);
            header("location: cadastrook.php");
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: " . $e->getMessage();
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
            <input type="text" name="nome" placeholder="Nome">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="senha" placeholder="Senha">
            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <footer>
        <p>&copy;2024. Flávio Ricardo.</p>
    </footer>
</body>

</html>