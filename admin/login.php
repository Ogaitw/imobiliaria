<?php
session_start();

// Simulação de dados do usuário (em um sistema real, isso viria do banco de dados)
$valid_username = 'admin';
$valid_password = '123456';

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se o nome de usuário e a senha estão corretos
    if ($username === $valid_username && $password === $valid_password) {
        // Armazena o nome de usuário na sessão
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        // Redireciona para a página de login com um parâmetro de erro
        header('Location: login_index.php?error=1');
        exit;
    }
}
?>
