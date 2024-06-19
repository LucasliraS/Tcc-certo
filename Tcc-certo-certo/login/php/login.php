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
    $query = "SELECT id FROM usuario WHERE email = ? AND senha = ?";
    $stmt = mysqli_prepare($conexao, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $senha);
    mysqli_stmt_execute($stmt);
    
    // Armazena o resultado da consulta
    mysqli_stmt_store_result($stmt);

    // Verifica se encontrou um usuário com as credenciais fornecidas
    if (mysqli_stmt_num_rows($stmt) == 1) {
        // Associa o resultado da consulta à variável $id
        mysqli_stmt_bind_result($stmt, $id);
        mysqli_stmt_fetch($stmt);

        // Inicia a sessão e armazena o ID e email do usuário
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['usuario_logado'] = true;

        // Redireciona para a página inicial do usuário
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
