<?php
// Conexão com o banco de dados
$conexao = mysqli_connect("localhost", "root", "", "cadastro");

// Verifica se a conexão foi bem sucedida
if (mysqli_connect_errno()) {
    die("Falha ao conectar ao MySQL: " . mysqli_connect_error());
}

// Consulta para buscar os jogos e suas imagens
$sql = "SELECT Nome, imagem_jogo FROM Jogo";
$resultado = mysqli_query($conexao, $sql);

$imagens = [];
if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $imagens[] = [
            'nome' => $row['Nome'],
            'imagem' => $row['imagem_jogo'] // Nome da imagem salva
        ];
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>

<ol class="carousel-indicators">
    <?php foreach ($imagens as $index => $jogo): ?>
        <?php if ($index < 3): ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ol>
<div class="carousel-inner">
    <?php
    $contador = 0;
    foreach ($imagens as $index => $jogo):
        if ($contador < 3): // Limita a 3 imagens
            $imagePath = "../../formulario/upload_imagem/" . $jogo['imagem'];
            ?>
            <div class="carousel-item <?= $contador === 0 ? 'active' : '' ?>">
                <img class="d-block w-100" src="<?= $imagePath ?>" alt="<?= $jogo['nome'] ?>">
            </div>
            <?php
            $contador++;
        endif;
    endforeach;
    ?>
</div>
