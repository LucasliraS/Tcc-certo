<?php
$error_message = ""; // Inicializa a variável de mensagem de erro
$success_message = ""; // Inicializa a variável de mensagem de sucesso

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexao com o banco de dados MySQL usando o XAMPP
    $conexao = mysqli_connect("localhost", "root", "", "cadastro");

    // Verifica se a conexao foi bem sucedida
    if (mysqli_connect_errno()) {
        $error_message = "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    } else {
        // Coleta os dados do formulário
        $nome = $_POST['nome_do_jogo'];
        $descricao = $_POST['descricao'];
        $genero = $_POST['genero'];
        $preco = $_POST['preco'];
        $nome_do_dev = $_POST['nome_do_dev'];
        $arquivo_jogo = $_FILES['arquivo_jogo']['name'];
        $logo_jogo = $_FILES['logo_jogo']['name'];
        $status = $_POST['status']; // saber se ele esta em breve ou agora

        // Diretório onde os arquivos serão armazenados
        $diretorio_imagem = "upload_imagem/";
        $diretorio_rar = "upload_rar/";
        $diretorio_logo = "upload_logo/";

        // Verifica o tipo de arquivo do jogo
        $extensao_arquivo_jogo = pathinfo($_FILES['arquivo_jogo']['name'], PATHINFO_EXTENSION);
        if ($extensao_arquivo_jogo !== 'zip' && $extensao_arquivo_jogo !== 'rar') {
            $error_message = "Erro: O arquivo do jogo deve ser .rar ou .zip";
        }
        

        // Verifica o tipo de arquivo da logo
        $extensao_logo_jogo = pathinfo($_FILES['logo_jogo']['name'], PATHINFO_EXTENSION);
        if (!in_array($extensao_logo_jogo, ['jpeg', 'jpg', 'png'])) {
            $error_message = "Erro: A logo deve ser um arquivo .jpeg, .jpg ou .png";
        }

        // Verifica os tipos de arquivo das imagens
        foreach ($_FILES['imagem_jogo']['tmp_name'] as $key => $tmp_name) {
            $extensao_imagem_jogo = pathinfo($_FILES['imagem_jogo']['name'][$key], PATHINFO_EXTENSION);
            if (!in_array($extensao_imagem_jogo, ['jpeg', 'jpg', 'png'])) {
                $error_message = "Erro: Todas as imagens devem ser arquivos .jpeg, .jpg ou .png";
                break;
            }
        }

        // Se não houver mensagens de erro, processa os arquivos e insere os dados no banco de dados
        if (empty($error_message)) {
            // Move o arquivo do jogo para o diretório especificado
            if (!move_uploaded_file($_FILES['arquivo_jogo']['tmp_name'], $diretorio_rar . $arquivo_jogo)) {
                $error_message = "Erro ao mover o arquivo do jogo para o diretório de destino.";
            }

            // Move a logo para o diretório especificado
            if (empty($error_message)) {
                // Move a logo para o diretório especificado
                $nome_logo_jogo = $_FILES['logo_jogo']['name']; // Nome original do arquivo
                if (!move_uploaded_file($_FILES['logo_jogo']['tmp_name'], $diretorio_logo . $nome_logo_jogo)) {
                    $error_message = "Erro ao mover a logo para o diretório de destino.";
                }
            }
            
            // Inicializa uma string para armazenar os nomes das imagens
            $imagens_jogo = [];

            // Itera sobre cada imagem e move para o diretório especificado
            if (empty($error_message)) {
                foreach ($_FILES['imagem_jogo']['tmp_name'] as $key => $tmp_name) {
                    $extensao_imagem_jogo = pathinfo($_FILES['imagem_jogo']['name'][$key], PATHINFO_EXTENSION);
                    $nome_imagem_jogo = uniqid() . '_' . $key . '.' . $extensao_imagem_jogo; // Nome único para a imagem com a extensão original
                    if (!move_uploaded_file($tmp_name, $diretorio_imagem . $nome_imagem_jogo)) {
                        $error_message = "Erro ao mover as imagens para o diretório de destino.";
                        break;
                    }
                    $imagens_jogo[] = $nome_imagem_jogo; // Armazena o nome da imagem
                }
            }

            // Converte o array de imagens para uma string separada por vírgulas para armazenar no banco de dados
            $imagens_jogo_str = implode(',', $imagens_jogo);

            // Prepara a consulta SQL para inserir os dados no banco de dados
            if (empty($error_message)) {
                $sql = "INSERT INTO Jogo (Nome, Descricao, Genero, Preco, nome_do_dev, arquivo_jogo, imagem_jogo, logo_jogo, status_jogo) VALUES ('$nome', '$descricao', '$genero', '$preco', '$nome_do_dev', '$arquivo_jogo', '$imagens_jogo_str', '$logo_jogo', '$status')";

                if (mysqli_query($conexao, $sql)) {
                    $success_message = "Novo jogo cadastrado com sucesso!";
                } else {
                    $error_message = "Erro: " . $sql . "<br>" . mysqli_error($conexao);
                }
            }

            // Fecha a conexão com o banco de dados
            mysqli_close($conexao);
        }
    }
}
?>






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

                <?php if (!empty($error_message)): ?>
                    <div class="error_message" style="color: red;"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <?php if (!empty($success_message)): ?>
                    <div class="success_message" style="color: green;"><?php echo $success_message; ?></div>
                <?php endif; ?>

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
                        <textarea class="formulario_input descricao" name="descricao" id="descInput"required></textarea>
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
                        <input type="file" name="arquivo_jogo" id="arquivoInput" accept=".rar" style="display: none;" required>
                        <div id="arquivoOutput"></div>

                        <label class="formulario_file" for="imagemInput">Selecione as imagens</label>
                        <input type="file" name="imagem_jogo[]" id="imagemInput" multiple accept=".jpeg,.jpg,.png" style="display: none;" required>
                        <div id="imagemOutput"></div>

                        <label class="formulario_file" for="logoInput">Selecione sua logo</label>
                        <input type="file" name="logo_jogo" id="logoInput" accept=".jpeg,.jpg,.png" style="display: none;" required>
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
