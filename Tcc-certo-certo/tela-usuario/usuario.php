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
      <img class="logo" src="../imagens/Logo.jpeg" src="" alt="Joystick Jungle">
      <nav class="navbar">
        <a href="../index/html2/index.php" class="a">Inicio</a>
        <a href="../infor/html2/info.php" class="a">Sobre</a>
        <a href="../suporte/html2/suporte.php" class="a">Suporte</a>
        
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

            <div class="logout">
            <a href="logout.php"><button class="logoutb"  type="submit">Logout</button></a>
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
                        <a class="link_up" href="../Formulario/formulario.php"><button class="upload" type="submit">Adicionar jogo</button></a>
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