<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$nome = htmlspecialchars($_SESSION['usuario']);
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
                <a href="logout.php" class="btn">Logout</a>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="welcome">
            <h1>Olá, <?= $nome; ?></h1>
        </div>
    </div>

    <footer>
        <p>&copy;2024. Flávio Ricardo.</p>
    </footer>
</body>

</html>