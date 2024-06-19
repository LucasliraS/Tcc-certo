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
    <title>Document</title>
    <link rel="stylesheet" href="../css/info.css">
    <link rel="stylesheet" href="../../navbar/navbar.css">

</head>
<body>
     <!--Navbar-->
  <div class="c">
    <header class="header">
      <h1><img class="logo" src="../../imagens/Logo.jpeg" alt="Joystick Jungle"></h1>
      <nav class="navbar">
        <a href="../../index/html2/index.php" class="a">Inicio</a>
            <a href="../../suporte/html/suporte.html" class="a">Suporte</a>
            <?php if (  isset($nome)) { ?> 
              <a href="../../tela-usuario/usuario.php" class="a john"><?= $nome ?></a>
            <?php } ?>
          
          <!--<img class="ipesq" id="pesquisarmuitoshow" src="../../index/imagens/lupa.png" alt="pesquisar">-->
        </div>
      </nav>
    </header>
    
  </div>





<!--fim Navbar-->



<div class="pos">
  
  <h2 >JOYSTICK JUNGLE</h2>
<p>
    A Joystick Jungle nasceu de uma paixão incontrolável por jogos e uma visão audaciosa de criar um espaço onde jogadores de todas as idades e níveis de habilidade pudessem encontrar não apenas os últimos lançamentos, mas também uma comunidade vibrante e acolhedora.
</p>

<p>
  A Joystick Jungle foi criada para atender a uma paixão compartilhada e uma necessidade clara no mercado de jogos.
</p>

<p>
  O objetivo da Joystick Jungle é ser o principal destino para os entusiastas de jogos indie, oferecendo uma curadoria excepcional de jogos independentes de alta qualidade. Nossa missão é apoiar e promover desenvolvedores independentes, proporcionando aos nossos clientes uma plataforma onde possam descobrir experiências de jogo únicas e inovadoras. Queremos criar uma comunidade vibrante e inclusiva, onde gamers de todas as idades possam explorar, compartilhar e se apaixonar por títulos indie. Além disso, buscamos realizar eventos, workshops e colaborações com desenvolvedores para fomentar a criatividade e o crescimento da cena indie de jogos.
</p>

<p>-MUITO OBRIGADO PELO APOIO :)</p>
</div>

</body>
</html>