<?php
session_start();
if (isset($_SESSION['id'])) {
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

if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true) {
    header("location: ../login/html/login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/pag-game.css">
    <link rel="stylesheet" href="../../navbar/navbar.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha384-ZvpUoO/+PpLzBOH5WyVG7E1a9o9TRAKSCAshh5OjXtM+Pl6Cn39U69f4c44GEgXK" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-p5VIzkrgU8Hok1frZG+Gz5qkLMV23RJkgHKt+H94eY+FZz6TtQqZ9a6M4+nh6I5Y" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-4PCWtJkVDoZFhpUQ5s3HrNsGkp36Aw9Xxf+lgD7ZXMfUI1FsbGCpup30cKpxK6G4" crossorigin="anonymous"></script>
</head>
<body>
    <!--Navbar-->
    <div class="c">
        <header class="header">
            <img class="logo" src="../../imagens/Logo.jpeg" alt="Joystick Jungle">
            <nav class="navbar">
                <a href="../../index/html2/index.php" class="a">Inicio</a>
                <a href="../../infor/html2/info.php" class="a">Sobre</a>
                <a href="../../suporte/html2/suporte.php" class="a">Suporte</a>
                <?php if (isset($nome)) { ?>
                    <a href="../../tela-usuario/usuario.php" class="a john"><?= htmlspecialchars($nome) ?></a>
                <?php } ?>
            </nav>
        </header>
    </div>
    <!--fim Navbar-->

    <?php
    
    // Recuperando os parâmetros da URL
    $nomeJogo = isset($_GET['nome']) ? htmlspecialchars($_GET['nome']) : 'Nome';
    $precoJogo = isset($_GET['preco']) ? htmlspecialchars($_GET['preco']) : '9,99';
    $generoJogo = isset($_GET['genero']) ? htmlspecialchars($_GET['genero']) : 'Gênero 1, Gênero 2, Gênero 3';
    $descricaoJogo = isset($_GET['descricao']) ? htmlspecialchars($_GET['descricao']) : 'Descrição não disponível.';
    $logo_jogo = isset($_GET['logo_jogo']) ? htmlspecialchars($_GET['logo_jogo']) : 'nao_disponivel.svg';
    $imagensJogo = isset($_GET['imagem']) ? explode(',', htmlspecialchars($_GET['imagem'])) : ['default1.svg', 'default2.svg', 'default3.svg'];
    $arquivo_jogo = isset($_GET['arquivo_jogo']) ? htmlspecialchars($_GET['arquivo_jogo']) : '';
    
    ?>

    <!--NOME DO JOGO E CARROSEL-->
    <h1 class="nomej" id="nomeJogo"><?= $nomeJogo ?></h1>

    <div class="ffvgf">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach ($imagensJogo as $index => $imagem): ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($imagensJogo as $index => $imagem): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <img class="d-block w-100" src="../../formulario/upload_imagem/<?= $imagem ?>" alt="Slide <?= $index + 1 ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!--FIM NOME DO JOGO E CARROSEL-->

    <img src="../../formulario/upload_logo/<?= $logo_jogo ?>" class="subimg" alt="Logo do Jogo">

    <!-- ESSA É A DIV QUE FAZ A DESCRIÇÃO-->
    <div class="descri">
        <p class="pos" id="game-description">DESCRIÇÃO: <?= $descricaoJogo ?></p>
    </div>
    <!--FIM DIV QUE FAZ A DESCRIÇÃO-->
    <div class="botao">
        <button class="stl-botao" onclick="window.location.href='../../formulario/upload_rar/<?= $arquivo_jogo ?>'">COMPRE AGORA</button> <!-- Botão de download -->

        <p></p>
        <div class="preco">
            <label class="label">R$</label>
            <label id="precoJogo"><?= $precoJogo != 0 ? $precoJogo : 'Gratuito' ?></label>
        </div>
    </div>
    <div class="genero">
        <p class="gen1">Gêneros</p>
        <p class="gen" id="game-genres"><?= $generoJogo ?></p>
    </div>
</body>
</html>
