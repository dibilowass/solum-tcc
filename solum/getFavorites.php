<?php
session_start();
require_once("./config/db.php");
require_once("./model/Produto.php");

$db = new Database();
$conn = $db->getConnection(); 

if (!isset($_SESSION['favorites']) || empty($_SESSION['favorites'])) {
    echo "<p>Você ainda não adicionou produtos aos favoritos.</p>";
    exit;
}

// Inicializa objeto Produto
$produtoObj = new Produto($conn); // $pdo é sua conexão com o banco

$favoritos = $_SESSION['favorites'];
$produtos = $produtoObj->getFavoritos($favoritos);

function formatPrice($price) {
    return 'R$ ' . number_format($price, 2, ',', '.');
}

foreach ($produtos as $produto): ?>
    <div class="produto-favorito">
        <img src="<?= $produto['proFoto'] ?>" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
        <strong><?= htmlspecialchars($produto['proNome']) ?></strong><br>
        <span><?= formatPrice($produto['proPreco']) ?></span><br>
        <a href="produto.php?proID=<?= $produto['proID'] ?>" class="btn btn-sm btn-outline-primary mt-1">Ver</a>
    </div>
    <hr>
<?php endforeach; ?>
