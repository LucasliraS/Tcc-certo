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
    $nome_do_dev = $_POST['nome_do_dev'];
    $arquivo_jogo = $_FILES['arquivo_jogo']['name'];
    $imagem_jogo = $_FILES['imagem_jogo']['name'];
    $logo_jogo = $_FILES['logo_jogo']['name'];
    $status = $_POST['status']; //saber se ele esta em breve ou agora

    // Diretório onde os arquivos serão armazenados
    $diretorio_imagem = "upload_imagem/";
    $diretorio_rar = "upload_rar/";
    $diretorio_logo = "upload_logo/";

    // Move os arquivos para o diretório especificado
    move_uploaded_file($_FILES['arquivo_jogo']['tmp_name'], $diretorio_rar . $arquivo_jogo);
    move_uploaded_file($_FILES['imagem_jogo']['tmp_name'], $diretorio_imagem . $imagem_jogo);
    move_uploaded_file($_FILES['logo_jogo']['tmp_name'], $diretorio_logo . $logo_jogo);

    // Prepara a consulta SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO Jogos (Nome, Descricao, Genero, Preco, nome_do_dev, arquivo_jogo, imagem_jogo, logo_jogo, status_jogo) VALUES ('$nome', '$descricao', '$genero', '$preco', '$nome_do_dev', '$arquivo_jogo', '$imagem_jogo', '$logo_jogo', '$status')";

    if (mysqli_query($conexao, $sql)) {
        echo "Novo jogo cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
}
?>
