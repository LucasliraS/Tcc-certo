
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexao com o banco de dados MySQL usando o XAMPP
    $conexao = mysqli_connect("localhost", "root", "", "cadastro");

    // Verifica se a conexao foi bem sucedida
    if (mysqli_connect_errno()) {
        echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
        exit();
    }

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_confirm = $_POST['senha_confirm'];

    // Verifica se as senhas coincidem
    if ($senha != $senha_confirm) {
        echo "As senhas não coincidem.";
    } else {
        // Verifica se o e-mail ja esta cadastrado
        $query_verifica_email = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado_verifica_email = mysqli_query($conexao, $query_verifica_email);

        if (mysqli_num_rows($resultado_verifica_email) > 0) {
            echo "Este e-mail já está cadastrado.";
        } else {
            // Insere os dados na tabela de usuarios
            $query_cadastro = "INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')";
            if (mysqli_query($conexao, $query_cadastro)) {
                echo "Cadastro realizado com sucesso!";
                // Redireciona para a pagina de sucesso
                header("Location: sucesso.php");
                exit();
            } else {
                echo "Erro ao cadastrar usuário: " . mysqli_error($conexao);
            }
        }
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}

?>
