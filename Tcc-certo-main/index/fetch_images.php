
<?php
// Conexão com o banco de dados
$conexao = mysqli_connect("localhost", "root", "", "cadastro");

// Verifica se a conexão foi bem sucedida
if (mysqli_connect_errno()) {
    die("Falha ao conectar ao MySQL: " . mysqli_connect_error());
}

// Consulta para buscar os jogos, suas imagens, nomes e preços
$sql = "SELECT Nome, imagem_jogo, Preco FROM Jogo WHERE status_jogo='lançado_agora'";
$resultado = mysqli_query($conexao, $sql);

$imagens = [];
if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $imagens[] = [
            'nome' => $row['Nome'],
            'imagem' => $row['imagem_jogo'],
            'preco' => $row['Preco']
        ];
    }
}
// Dividindo os arrays para diferentes carrosséis
$destaques = array_slice($imagens, 0, 3); // Primeiros 3 jogos para Destaques
$lancamentos = array_slice($imagens, 3, 6); // Próximos 3 jogos para Lançamentos
$jogosPopulares = $imagens; // Jogos Populares - Exibir tudo

// Embaralha os jogos populares
shuffle($jogosPopulares);
$jogosPopulares = array_slice($jogosPopulares, 0, 6); // Limitar a 6 jogos


if (isset($_POST['game_id'])) {
    $game_id = $_POST['game_id'];

    // Consulta para buscar os dados do jogo pelo ID
    $sql = "SELECT Nome, Descricao, Genero, Preco, nome_do_dev, data_lancamento FROM Jogo WHERE id = $game_id";
    $resultado = mysqli_query($conexao, $sql);

    // Verifica se encontrou o jogo
    if ($resultado) {
        $jogo = mysqli_fetch_assoc($resultado);

        // Retorna os dados do jogo em formato JSON
        echo json_encode($jogo);
    } else {
        echo json_encode(array('error' => 'Jogo não encontrado'));
    }
} else {
    echo json_encode(array('error' => 'ID do jogo não fornecido'));
}
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
                <img class="d-block w-100" src="<?= $imagePath ?>" alt="<?= $jogo['nome'] ?>" style="object-fit: <?= $contador === 0 ? 'cover' : 'contain' ?>">
            </div>
            <?php
            $contador++;
        endif;
    endforeach;
    ?>
</div>

