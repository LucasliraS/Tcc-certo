<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/pag-game.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
  
<body>
    <!--Navbar-->
    <div class="c">
        <header class="header">
            <img class="logo" src="../../index/imagens/Logo.jpeg" alt="Joystick Jungle">
            <nav class="navbar">
                <a href="#" class="a">Inicio</a>
                <a href="#" class="a">Sobre</a>
                <a href="#" class="a">Suporte</a>
                <a href="#" class="a">Iniciar sessão</a>
                <div class="pesquisar" id="divpesquisa" onclick="abrirpesquisa(event)">
                    <!--<img class="ipesq" id="pesquisarmuitoshow" src="../../index/imagens/lupa.png" alt="pesquisar">-->
                </div>
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
    ?>

    <!--NOME DO JOGO E CARROSEL-->
    <h1 id="nomeJogo"><?= $nomeJogo ?></h1>

    <div class="ffvgf">
        <div id="carouselExampleIndicators" class="carousel slide">
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

    <img src="../../formulario/upload_logo/<?= $logo_jogo ?>" class="subimg">

    <!-- ESSA É A DIV QUE FAZ A DESCRIÇÃO-->
    <div class="descri">
        <p class="pos" id="game-description">DESCRIÇÃO: <?= $descricaoJogo ?></p>
    </div>
    <!--FIM DIV QUE FAZ A DESCRIÇÃO-->
    <?php
echo '<pre>';
print_r($_GET);
echo '</pre>';
    ?>
    <div class="botao">
        <button class="stl-botao">COMPRE AGORA</button>

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
