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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/motiva-sans" rel="stylesheet">
    <link rel="stylesheet" href="usuario.css">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <title>Document</title>
</head>
<body>

                 <!--Navbar-->
  <div class="c">
    <header class="header">
      <img class="logo" src="" alt="Joystick Jungle">
      <nav class="navbar">
        <a href="#" class="a">Inicio</a>
        <a href="#" class="a">Sobre</a>
        <a href="#" class="a">Suporte</a>
        <div class="pesquisar" id="divpesquisa" onclick="abrirpesquisa(event)">
          
          <!--<img class="ipesq" id="pesquisarmuitoshow" src="../../index/imagens/lupa.png" alt="pesquisar">-->
        </div>
      </nav>
    </header>
    
  </div>

    <div class="box">
        <div class="usuario">
            <div class="imgusuario">
                <img src="../imagens/user.png" class="fotouser" alt="usuario">
            </div>
            <div class="nome">
                <?php if(isset($nome)): ?>
                    <p class="nomeu">Olá, <?= $nome ?>!</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="tabs">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'tab1')" id="defaultOpen">Amigos</button>
                <button class="tablinks" onclick="openTab(event, 'tab2')">Conquistas</button>
                <button class="tablinks" onclick="openTab(event, 'tab3')">Enviar jogos</button>
            </div>
            <div class="conteudo">
                <div id="tab1" class="tabcontent">
                    <h3>0 Amigos</h3>
                </div>
                
                <div id="tab2" class="tabcontent">
                    <h3>Conquistas</h3>
                    <div class="div-achi">
                        <img src="../imagens/conquistas.png" class="conquistas">
                    </div>
                    <p class="achiv">Suas conquistas apareceram aqui.</p>
                </div>
                
                <div id="tab3" class="tabcontent">
                    <h3>Fazer upload do Jogo</h3>
                    <div class="upload_bottun">
                        <a class="link_up" href="../Formulario/formulario.html"><button class="upload" type="submit">Adicionar jogo</button></a>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="script.js"></script> <!-- Script JavaScript -->
    </body>
    </html>

    </div>
</body>
</html>