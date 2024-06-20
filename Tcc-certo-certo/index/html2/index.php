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

if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true) {
  header("location: ../login/html/login.html");
  exit; 
}
?>


<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../../navbar/navbar.css">

  
  <title>Inicio</title>
</head>

<body>

  <!--Navbar-->
  <div class="c">
    <header class="header">
      <img class="logo" src="../../imagens/Logo.jpeg" alt="Joystick Jungle">
      <nav class="navbar">
        <a href="#" class="a">Inicio</a>
        <a href="../../infor/html2/info.php" class="a">Sobre</a>
        <a href="../../suporte/html2/suporte.php" class="a">Suporte</a>

        <?php if (  isset($nome)) { ?> 
          <a href="../../tela-usuario/usuario.php" class="a john"><?= $nome ?></a>
        <?php } ?>

            <div class="pesquisar" id="divpesquisa">
              <input type="text" id="Buscar" placeholder="Buscar" class="Buscar"/>
            </div>
      </nav>
    </header>
    
  </div>
<!--fim Navbar-->


<div class="box">
  <div class="tamanhoS">
    <h2>Destaques da semana</h2>
    <div class="df">
      <div id="carouselExampleIndicators" class="carousel slide">
        <?php include '../fetch_images.php'; ?>
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
  </div>

 <!-- Lançamentos -->
<div class="tamanhoS1">
  <div class="destaques">
    <div class="vermais">
      <h2 class="titulo">Lançamentos</h2>
      <a href="../ver_mais-lancamentos2.php"><button class="botao" type="submit">VER MAIS</button></a>
    </div>
    <div id="carouselExampleIndicators-2" class="carousel slide" data-interval="false">
      <!-- Removido o código dos indicadores numéricos -->
      <div class="carousel-inner">
        <?php
        $chunks = array_chunk($imagens, 3); // Divide as imagens em grupos de 3
        foreach ($chunks as $index => $chunk):
          ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <div class="container">
              <div class="row">
                <?php foreach ($chunk as $jogo): ?>
                  <div class="col-sm-4">
                    <a href="../../pag-game/html2/pag-game.php?nome=<?= urlencode($jogo['nome']) ?>&preco=<?= urlencode($jogo['preco']) ?>&imagem=<?= urlencode($jogo['imagem']) ?>&genero=<?= urlencode($jogo['genero']) ?>&descricao=<?= urlencode($jogo['descricao']) ?>&logo_jogo=<?= urlencode($jogo['logo_jogo']) ?>&arquivo_jogo=<?= urlencode($jogo['arquivo_jogo']) ?>">
                      <div class="cardj">
                        <div class="imagej">
                          <div class="realimg">
                            <img class="img-fluid w-100" src="<?= "../../formulario/upload_logo/" . $jogo['logo_jogo'] ?>" alt="<?= $jogo['nome'] ?>">
                          </div>
                        </div>
                        <div class="gamen">
                          <h2 class="nomej"><?= $jogo['nome'] ?></h2>
                          <h3><?= $jogo['preco'] == 0 ? 'Gratuito' : 'R$ ' . number_format($jogo['preco'], 2, ',', '.') ?></h3>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>


<!--Jogos populares-->
<div class="tamanhoS2">
  <div class="destaques">
    <div class="vermais">
      <h2 class="titulo">Jogos populares</h2>
      <a href="../ver_mais-lancamentos2.php"><button class="botao" type="submit">VER MAIS</button></a>
    </div>
    <div id="carouselExampleIndicators-3" class="carousel slide" data-interval="false">
      <ol class="carousel-indicators">
        <?php foreach ($jogosPopulares as $index => $jogo): ?>
          
        <?php endforeach; ?>
      </ol>
      <div class="carousel-inner">
        <?php
        $chunks = array_chunk($jogosPopulares, 3); // Divide as imagens em grupos de 3
        foreach ($chunks as $index => $chunk):
          ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <div class="container">
              <div class="row">
                <?php foreach ($chunk as $jogo): ?>
                  <div class="col-sm-4">
                    <!-- Início do link para a página ../../pag-game/html/pag-game.html -->
                    <a href="../../pag-game/html2/pag-game.php?nome=<?= urlencode($jogo['nome']) ?>&preco=<?= urlencode($jogo['preco']) ?>&imagem=<?= urlencode($jogo['imagem']) ?>&genero=<?= urlencode($jogo['genero']) ?>&descricao=<?= urlencode($jogo['descricao']) ?>&logo_jogo=<?= urlencode($jogo['logo_jogo']) ?>&arquivo_jogo=<?= urlencode($jogo['arquivo_jogo']) ?>">
                      <div class="cardj">
                        <div class="imagej">
                          <div class="realimg">
                            <img class="img-fluid w-100" src="<?= "../../formulario/upload_logo/" . $jogo['logo_jogo'] ?>" alt="<?= $jogo['nome'] ?>">
                          </div>
                        </div>
                        <div class="gamen">
                          <h2 class="nomej"><?= $jogo['nome'] ?></h2>
                          <h3><?= $jogo['preco'] == 0 ? 'Gratuito' : 'R$ ' . number_format($jogo['preco'], 2, ',', '.') ?></h3>
                        </div>
                      </div>
                    </a>
                    <!-- Fim do link para a página ../../pag-game/html/pag-game.html -->
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators-3" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators-3" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>


<!--Procurar por categorias-->
<div class="tamanhoS3">
  <div class="destaques">
    <div class="vermais">
      <h2 class="titulo">Procurar por categorias</h2>
    </div>
    <div id="carouselExampleIndicators-4" class="carousel slide" data-interval="false">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators-4" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators-4" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="conteudo">
            <div class="row">
              <div class="col-sm">
                <div class="cardc">
                  <div class="imageg">
                    <a href="../ver_mais-lancamentos2.php"><img class="categoria" src="../../imagens/acao.jpg" alt="Ação"></a>                     
                  </div>
                  <div class="gameng">
                    <h2 class="nomec">Ação</h2>
                  </div>
                </div>
              </div>
              <div class="col-sm">
                <div class="cardc">
                  <div class="imageg">
                  <a href="../ver_mais-lancamentos2.php"><img class="categoria" src="../../imagens/aventura.jpg" alt="Aventura"></a>                     
                  </div>
                  <div class="gameng">
                    <h2 class="nomec">Aventura</h2>
                  </div>
                </div>
              </div>
              <div class="col-sm">
                <div class="cardc">
                  <div class="imageg">
                  <a href="../ver_mais-lancamentos2.php"><img class="categoria" src="../../imagens/rpg.jpg" alt="RPG"></a>                     
                  </div>
                  <div class="gameng">
                    <h2 class="nomec">RPG</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="conteudo">
            <div class="row">
              <div class="col-sm">
                <div class="cardc">
                  <div class="imageg">
                  <a href="../ver_mais-lancamentos2.php"><img class="categoria" src="../../imagens/estrategia.png" alt="Estratégia"></a>                     
                  </div>
                  <div class="gameng">
                    <h2 class="nomec">Estratégia</h2>
                  </div>
                </div>
              </div>
              <div class="col-sm">
                <div class="cardc">
                  <div class="imageg">
                  <a href="../ver_mais-lancamentos2.php"><img class="categoria" src="../../imagens/simulacao.jpg" alt="Simulação"></a>                     
                  </div>
                  <div class="gameng">
                    <h2 class="nomec">Simulação</h2>
                  </div>
                </div>
              </div>
              <div class="col-sm">
                <div class="cardc">
                  <div class="imageg">
                  <a href="../ver_mais-lancamentos2.php"><img class="categoria" src="../../imagens/fps.jpg" alt="FPS"></a>                     
                  </div>
                  <div class="gameng">
                    <h2 class="nomec">FPS</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators-4" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators-4" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>

<!-- Promoçoes especias -->
<div class="tamanhoS4">
  <div class="destaques">
    <div class="vermais">
      <h2 class="titulo">Promoções especiais</h2>
      <a href="../ver_mais-lancamentos2.php"><button class="botao" type="submit">VER MAIS</button></a>
    </div>
    <div id="carouselExampleIndicators-5" class="carousel slide" data-interval="false">
      <ol class="carousel-indicators">
        <?php 
        $filteredImagens = array_filter($imagens, function($jogo) {
          return $jogo['preco'] > 1 && $jogo['preco'] <= 10;
        });
        $chunks = array_chunk($filteredImagens, 3);
        foreach ($chunks as $index => $chunk): ?>
          <li data-target="#carouselExampleIndicators-5" data-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></li>
        <?php endforeach; ?>
      </ol>
      <div class="carousel-inner">
        <?php foreach ($chunks as $index => $chunk): ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <div class="container">
              <div class="row">
                <?php foreach ($chunk as $jogo): ?>
                  <div class="col-sm-4">
                  <a href="../../pag-game/html2/pag-game.php?nome=<?= urlencode($jogo['nome']) ?>&preco=<?= urlencode($jogo['preco']) ?>&imagem=<?= urlencode($jogo['imagem']) ?>&genero=<?= urlencode($jogo['genero']) ?>&descricao=<?= urlencode($jogo['descricao']) ?>&logo_jogo=<?= urlencode($jogo['logo_jogo']) ?>&arquivo_jogo=<?= urlencode($jogo['arquivo_jogo']) ?>">
                      <div class="cardj">
                        <div class="imagej">
                          <div class="realimg">
                            <img class="img-fluid w-100" src="<?= "../../formulario/upload_logo/" . $jogo['logo_jogo'] ?>" alt="<?= $jogo['nome'] ?>">
                          </div>
                        </div>
                        <div class="gamen">
                          <h2 class="nomej"><?= $jogo['nome'] ?></h2>
                          <h3><?= $jogo['preco'] == 0 ? 'Gratuito' : 'R$ ' . number_format($jogo['preco'], 2, ',', '.') ?></h3>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators-5" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators-5" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>


      <div class="box2">
        <div class="ver2 esq">
          <h3>Em breve</h3>
          <?php
          // Consulta SQL para buscar os jogos marcados como "em_breve"
          $sql = "SELECT Imagem_jogo, Nome FROM Jogo WHERE status_jogo = 'em_breve' ORDER BY id DESC";
          $resultado = mysqli_query($conexao, $sql);

          // Contador para limitar o número de imagens a serem exibidas
          $contador = 0;

          // Verifica se há resultados
          if (mysqli_num_rows($resultado) > 0) {
              // Loop através dos resultados
              while ($row = mysqli_fetch_assoc($resultado)) {
                  // Verifica se ainda podemos exibir mais imagens
                  if ($contador < 5) {
                      // Exibe a imagem
                      echo '<div class="jogos">';
                      echo '<img class="embreve" src="../../formulario/upload_imagem/' . $row['Imagem_jogo'] . '" alt="Imagem do jogo">';
                      echo '<p class="nome-jogo">' . $row['Nome'] . '</p>';
                      echo '</div>';
                      $contador++;
                  }
              }
          } else {
              echo '<p>Nenhuma imagem de jogo em breve no momento.</p>';
          }
          ?>
        </div>


      
        <div class="ver2">
        <h3>Mais vistos</h3>
        <?php
          // Consulta SQL para buscar os jogos marcados como "em_breve"
          $sql = "SELECT Imagem_jogo, Nome FROM Jogo WHERE status_jogo != 'em_breve' AND id >= 5 ORDER BY id DESC LIMIT 5";
          $resultado = mysqli_query($conexao, $sql);

          // Contador para limitar o número de imagens a serem exibidas
          $contador = 0;

          // Verifica se há resultados
          if (mysqli_num_rows($resultado) > 0) {
              // Loop através dos resultados
              while ($row = mysqli_fetch_assoc($resultado)) {
                  // Verifica se ainda podemos exibir mais imagens
                  if ($contador < 5) {
                      // Exibe a imagem
                      echo '<div class="jogos">';
                      echo '<img class="embreve" src="../../formulario/upload_imagem/' . $row['Imagem_jogo'] . '" alt="Imagem do jogo">';
                      echo '<p class="nome-jogo">' . $row['Nome'] . '</p>';
                      echo '</div>';
                      $contador++;
                  }
              }
          } else {
              echo '<p>Nenhuma imagem de jogo em breve no momento.</p>';
          }
          ?>
          </div>
      </div>

      
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    
</body>

</html>
