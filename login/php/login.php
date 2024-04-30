<?php
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados MySQL usando o XAMPP
    $conexao = mysqli_connect("localhost", "root", "", "cadastro");

    // Verifica se a conexão foi bem sucedida
    if (mysqli_connect_errno()) {
        echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
        exit();
    }

    // Recebe os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];





    //NÃO MEXE MARCO, ESSA PARTE PRA BAIXO É DO BANCO DE DADOS, NAO MEXE PORRA (SE FOR MEXER AVISA)
    // Consulta SQL para verificar as credenciais do usuário
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $resultado = mysqli_query($conexao, $query);

    // Verifica se encontrou um usuário com as credenciais fornecidas
    if (mysqli_num_rows($resultado) == 1) {
        // Inicia a sessão e redireciona para a página inicial, por exemplo
        $_SESSION['email'] = $email;
        header("Location: pagina_inicial.php");
        exit();
    } else {
        echo "E-mail ou senha incorretos.";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}
?>
