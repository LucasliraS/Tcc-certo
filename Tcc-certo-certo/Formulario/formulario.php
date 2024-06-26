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
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="../navbar/navbar.css">
        <title>Document</title>
    </head>
    <body>
        <!--Navbar-->
        <div class="c">
            <header class="header">
            <img class="logo" src="../imagens/Logo.jpeg" alt="Joystick Jungle">
            <nav class="navbar">
                <a href="#" class="a">Inicio</a>
                <a href="../../infor/html/info.html" class="a">Sobre</a>
                <a href="../../suporte/html/suporte.html" class="a">Suporte</a>
                <?php if(isset($nome)): ?>
                    <a href="../../tela-usuario/usuario.php" class="a john"><?= $nome ?></a>
                <?php endif; ?>
                </div>
            </nav>
            </header>
            
        </div>
        <!--fim Navbar-->


        <div class="container">
            <form class="formulario" action="inserir_jogo.php" method="post" enctype="multipart/form-data">

                <div class="formulario_container">

                    <h1 class="formulario_titulo">Formulario de Jogo</h1>

                    <div class="container_input">
                        <label for="nomeInput">Nome do jogo</label>
                        <input class="formulario_input" type="text" name="nome_do_jogo" id="nomeInput" required>
                    </div>

                    <div class="container_input">
                        <label for="devInput">Nome dos Devs/Empresa</label>
                        <input class="formulario_input" type="text" name="nome_do_dev" id="devInput" required>
                    </div>

                    <div class="container_input">
                        <label for="descInput">Descrição: </label>
                        <textarea class="formulario_input descricao" name="descricao" id="descInput" required></textarea>
                    </div>
                    
                    <div class="container_input">
                        <label for="generoSelect">Gênero</label>
                        <select class="formulario_input" name="genero" id="generoSelect" required>
                            <option value="acao">Ação</option>
                            <option value="aventura">Aventura</option>
                            <option value="rpg">RPG</option>
                            <option value="estrategia">Estratégia</option>
                            <option value="simulacao">Simulação</option>
                            <option value="fps">FPS</option>
                        </select>
                    </div>

                    <div class="container_input">
                        <label for="precoInput">Preço: </label>
                        <input class="formulario_input" type="text" id="precoInput" name="preco" required>
                    </div>

                    <div class="container_file">
                        <label class="formulario_file" for="arquivoInput">Selecione o arquivo do jogo</label>
                        <input type="file" name="arquivo_jogo" id="arquivoInput" style="display: none;" required>
                        <div id="arquivoOutput"></div>

                        <label class="formulario_file" for="imagemInput">Selecione as imagens</label>
                        <input type="file" name="imagem_jogo[]" id="imagemInput" multiple style="display: none;" required>
                        <div id="imagemOutput"></div>

                        <label class="formulario_file" for="logoInput">Selecione sua logo</label>
                        <input type="file" name="logo_jogo" id="logoInput" style="display: none;" required>
                        <div id="logoOutput"></div>
                    </div>

                    <div class="container_radio">
                        <h3 class="radio_titulo">O jogo lançara: </h3>
                        <div class="container_radio_option">
                            <label class="radio_option" for="emBreveInput">Em breve</label>
                            <input type="radio" id="emBreveInput" name="status" value="em_breve">
                        </div>
                        <div class="container_radio_option">
                            <label class="radio_option" for="LancadoInput">Lançado agora</label>
                            <input type="radio" id="LancadoInput" name="status" value="lancado_agora">
                        </div>
                    </div>

                    <div class="container_submit">
                        <button class="formulario_submit" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            document.getElementById('arquivoInput').addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    document.getElementById('arquivoOutput').textContent = `Arquivo: ${file.name}`;
                }
            });

            document.getElementById('imagemInput').addEventListener('change', function() {
                const files = this.files;
                const output = document.getElementById('imagemOutput');
                output.innerHTML = '';
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        img.style.marginRight = '10px';
                        output.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            });

            document.getElementById('logoInput').addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '100px';
                        document.getElementById('logoOutput').innerHTML = '';
                        document.getElementById('logoOutput').appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>
    </body>
</html>
