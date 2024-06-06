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

    <!--NOME DO JOGO E CARROSEL-->
    <h1 id="nomeJogo">Nome</h1>

    <div class="ffvgf">
        <div id="carouselExampleIndicators" class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../../index/imagens/firstimg.svg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../index/imagens/secondimg.svg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../index/imagens/thirdimg.svg" alt="Third slide">
                </div>
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

    <img src="../../index/imagens/firstimg.svg" class="subimg">

    <!-- ESSA É A DIV QUE FAZ A DESCRIÇÃO-->
    <div class="descri">
        <p class="pos" id="game-description">DESCRIÇÃO:</p>
    </div>
    <!--FIM DIV QUE FAZ A DESCRIÇÃO-->

    <div class="botao">
        <button class="stl-botao">COMPRE AGORA</button>

        <p></p>
        <div class="preco">
            <label class="label">R$</label> 
            <label id="precoJogo">9,99</label> <!-- Valor padrão, será substituído pelo JavaScript -->
        </div>
    </div>
    <div class="genero">
        <p class="gen1">Gêneros</p>
        <p class="gen" id="game-genres">Gênero 1, Gênero 2, Gênero 3</p>
    </div>

    <script>
        // Função para recuperar parâmetros da URL
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

        // Recuperando os parâmetros
       // Recuperando os parâmetros
var nomeJogo = getParameterByName('nome');
var precoJogo = getParameterByName('preco');
var imagemJogo = getParameterByName('imagem');
var generoJogo = getParameterByName('genero');
var descricaoJogo = getParameterByName('descricao');

// Usando os valores recuperados para exibir informações
document.getElementById('nomeJogo').innerText = nomeJogo || 'Nome';
document.getElementById('precoJogo').innerText = precoJogo !== null && precoJogo != 0 ? precoJogo : 'Gratuito';
document.getElementById('imagemJogo').src = "../../formulario/upload_imagem/" + (imagemJogo || "default.svg");
document.getElementById('game-genres').innerText = generoJogo || 'Gênero 1, Gênero 2, Gênero 3';
document.getElementById('game-description').innerText = "DESCRIÇÃO: " + (descricaoJogo || 'Descrição não disponível.');

    </script>
</body>
</html>