<?php
// Configurações do banco de dados
$host = 'localhost'; // Endereço do servidor de banco de dados
$dbname = 'login'; // Nome do banco de dados
$username = 'root'; // Usuário do banco de dados
$password = 'Psd@1801#Fhr@1701'; // Senha do banco de dados

try {
    // Criando a conexão com o banco de dados usando PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Configura o modo de erro para exceções
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Define o modo de fetch para associativo
        PDO::ATTR_EMULATE_PREPARES => false, // Desativa emulação de prepared statements para segurança
    ];

    // Instanciando o objeto PDO
    $pdo = new PDO($dsn, $username, $password, $options);

    // echo "Conexão com o banco de dados estabelecida com sucesso!";
} catch (PDOException $e) {
    // Captura e exibe erros na conexão
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
