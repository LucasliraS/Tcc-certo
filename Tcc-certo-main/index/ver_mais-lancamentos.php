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
            <img class="logo" src="../imagens/Logo.jpeg"  alt="Joystick Jungle">
            <nav class="navbar">
                <a href="../index/html/index.php" class="a">Inicio</a>
                <a href="#" class="a">Sobre</a>
                <a href="#" class="a">Suporte</a>
                <a href="../login/html/login.html" class="a">Iniciar sessão</a>
                <div class="pesquisar" id="divpesquisa" onclick="abrirpesquisa(event)">
          
                    <!--<img class="ipesq" id="pesquisarmuitoshow" src="../../index/imagens/lupa.png" alt="pesquisar">-->
                </div>
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
                    <option value="menor30">$30 ou menos</option>
                    <option value="menor25">$25 ou menos</option>
                    <option value="menor50">$50 ou menos</option>
                    <option value="menor100">$100 ou menos</option>
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
            echo '<a href="../pag-game/html/pag-game.php?id=' . $row["id"] . '&nome=' . urlencode($row["Nome"]) . '&preco=' . $row["Preco"] . '&genero=' . urlencode($row["Genero"]) . '&descricao=' . urlencode($row["Descricao"]) . '&logo_jogo=' . urlencode($row["logo_jogo"]) . '&imagem=' . urlencode($row["Imagem_jogo"]) . '&arquivo_jogo=' . urlencode($row["arquivo_jogo"]) . '" class="card" data-category="' . $row["Genero"] . '" data-price="' . $row["Preco"] . '">';
            echo '<div class="imagem">';
            echo '<img src="../formulario/upload_imagem/' . $row["Imagem_jogo"] . '" alt="Game Image" style="width:100%">';
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

// Atualize a função filterGames() para chamar a função filterByGenre() quando o filtro de gênero for alterado
function filterGames() {
    filterByGenre();
    // Adicione aqui qualquer outra lógica de filtragem que você já tenha implementado
}
</script>