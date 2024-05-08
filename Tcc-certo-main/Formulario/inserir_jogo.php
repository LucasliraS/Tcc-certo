<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexao com o banco de dados MySQL usando o XAMPP
    $conexao = mysqli_connect("localhost", "root", "", "cadastro");

    // Verifica se a conexao foi bem sucedida
    if (mysqli_connect_errno()) {
        echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
        exit();
    }

    // Coleta os dados do formulário
    $nome = $_POST['nome_do_jogo'];
    $descricao = $_POST['descricao'];
    $genero = $_POST['genero'];
    $preco = $_POST['preco'];
    $nome_do_dv = $_POST['nome_do_dev'];
    $arquivo_jogo = $_POST['arquivo_jogo'];
    $imagem_jogo = $_POST ['imagem_jogo'];
    $logo_jogo = $_POST ['logo_jogo'];

    
    // Prepara a consulta SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO Jogos (Nome, Descricao, Genero, Preco, arquivo_jogo, imagem_jogo, logo_jogo) VALUES ('$nome', '$descricao', '$genero', '$preco', '$arquivo_jogo', '$imagem_jogo', '$logo_jogo')";

    if (mysqli_query($conexao, $sql)) {
        echo "Novo jogo cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}
?>
