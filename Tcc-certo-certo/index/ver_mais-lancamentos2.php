<?php
session_start();
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    // Conectar ao banco de dados
    $pdo = new PDO('mysql:host=localhost;dbname=cadastro', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Consulta SQL para obter o nome do usuário com base no ID
    $sql_code = "SELECT nome FROM usuario WHERE id = :id";
    $prepare = $pdo->prepare($sql_code);
    $prepare->bindParam(':id', $id);
    $prepare->execute();
    
    // Obter resultados
    $usuario = $prepare->fetch(PDO::FETCH_ASSOC);
    $nome = $usuario['nome'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ver_mais.css">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <title>Document</title>
</head>
<body>

    <!--Navbar-->
    <div class="c">
        <header class="header">
            <img class="logo" src="../imagens/Logo.jpeg" alt="Joystick Jungle">
            <nav class="navbar">
                <a href="../index/html2/index.php" class="a">Inicio</a>
                <a href="../infor/html2/info.php" class="a">Sobre</a>
                <a href="../suporte/html2/suporte.php" class="a">Suporte</a>
                <?php if (isset($nome)) { ?> 
                    <a href="../../tela-usuario/usuario.php" class="a john"><?= $nome ?></a>
                <?php } ?>
            </nav>
        </header>
    </div>
    <!--fim Navbar-->

    <div class="box">
        <div class="filter-container">
            <div class="filtro">
                <select class="botao-filtro" id="categoryFilter" onchange="filterGames()">
                    <option value="all">Todas as categorias</option>
                    <option value="aventura">Aventura</option>
                    <option value="acao">Ação</option>
                    <option value="rpg">Rpg</option>
                    <option value="estrategia">Estratégia</option>
                    <option value="puzzle">Puzzle</option>
                </select>
            </div>
            <div class="filtro">
                <select class="botao-filtro" id="priceFilter" onchange="filterGames()">
                    <option value="all">Todos os preços</option>
                    <option value="menor30">R$ 30 ou menos</option>
                    <option value="menor25">R$ 25 ou menos</option>
                    <option value="menor50">R$ 50 ou menos</option>
                    <option value="menor100">R$ 100 ou menos</option>
                </select>
            </div>
        </div>

        <div class="jogos">
            <?php
            $conexao = mysqli_connect("localhost", "root", "", "cadastro");

            // Verifica a conexão
            if ($conexao->connect_error) {
                die("Connection failed: " . $conexao->connect_error);
            }

            // Consulta para selecionar os jogos
            $sql = "SELECT * FROM Jogo WHERE status_jogo!='em_breve'";
            $result = $conexao->query($sql);

            // Se houver resultados, exibe os jogos
            if ($result->num_rows > 0) {
                // Loop através dos resultados
                while($row = $result->fetch_assoc()) {
                    // Imprime o HTML do card com os dados do jogo
                    echo '<a href="../pag-game/html2/pag-game.php?nome=' . urlencode($row["Nome"]) . '&preco=' . urlencode($row["Preco"]) . '&imagem=' . urlencode($row["Imagem_jogo"]) . '&genero=' . urlencode($row["Genero"]) . '&descricao=' . urlencode($row["Descricao"]) . '&logo_jogo=' . urlencode($row["logo_jogo"]) . '&arquivo_jogo=' . urlencode($row["arquivo_jogo"]) . '" class="card" data-category="' . $row["Genero"] . '" data-price="' . $row["Preco"] . '">';
                    echo '<div class="imagem">';
                    echo '<img src="../formulario/upload_logo/' . $row["logo_jogo"] . '" alt="Game Image" style="width:100%">';
                    echo '</div>';
                    echo '<div class="container">';
                    echo '<h4><b>' . $row["Nome"] . '</b></h4>';
                    echo '<p>' . $row["Descricao"] . '</p>';
                    echo '<div class="price">R$ ' . number_format($row["Preco"], 2, ',', '.') . '</div>';
                    echo '</div>';
                    echo '</a>';
                }
            } else {
                echo "0 resultados";
            }
            $conexao->close();
            ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

<script>
function filterByGenre() {
    var selectedGenre = document.getElementById("categoryFilter").value;
    var jogos = document.querySelectorAll(".jogos .card");

    jogos.forEach(function(jogo) {
        var categoria = jogo.getAttribute("data-category");
        if (selectedGenre === "all" || categoria === selectedGenre) {
            jogo.style.display = "block";
        } else {
            jogo.style.display = "none";
        }
    });
}

function filterGames() {
    filterByGenre();
}
</script>
