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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/suporte.css">
    <link rel="stylesheet" href="../../navbar/navbar.css">

    
  </head>
  
<body>
    <!--Navbar-->
    <div class="c">
      <header class="header">
        <img class="logo" src="../../imagens/Logo.jpeg" alt="Joystick Jungle">
        <nav class="navbar">
          <a href="../../index/html2/index.php" class="a">Inicio</a>
          <a href="../../infor/html2/info.php" class="a">Sobre</a>
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
  
    <h2 >QUALQUER DUVIDA ENTRE EM CONTATO</h2>
  <p>
      TELEFONE: 22 56488-8724
  </p>
  
  <p>
    EMAIL: JoystickJungle@gmail.com
  </p>
  
  <p>
    TELEFONE2: 22 56488-8700
  </p>
  
  <p>EMAIL2: JoystickJungle-suporte@gmail.com</p>
  </div>
  

</body>
</html>