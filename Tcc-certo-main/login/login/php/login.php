<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados MySQL
    $conexao = mysqli_connect("localhost", "root", "", "cadastro");

    // Verifica se a conexão foi bem sucedida
    if (mysqli_connect_errno()) {
        echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
        exit();
    }

    // Recebe os dados do formulário e sanitiza-os
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);


    // Consulta SQL usando prepared statement para evitar injeção de SQL
    $query = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
    $stmt = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
    mysqli_stmt_execute($stmt);
    

    // Armazena o resultado da consulta
    mysqli_stmt_store_result($stmt);

    // Verifica se encontrou um usuário com as credenciais fornecidas
    if (mysqli_stmt_num_rows($stmt) == 1) {
        // Inicia a sessão e redireciona para a página inicial
        $_SESSION['email'] = $email;
        header("Location: ../../tela-usuario/usuario.php");
        exit();
    } else {
        echo "E-mail ou senha incorretos.";
    }

    // Fecha o statement
    mysqli_stmt_close($stmt);

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}
?>
