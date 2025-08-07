<?php require_once("./utils/session.php") ?>
<?php require_once("./utils/header.php");

if (isset($_SESSION['usuID'])) {

    require_once("./utils/navbar_logado.php");
} else {

    require_once("./utils/navbar_nao-logado.php");
}
?>

<?php 
    function isInFavorites($productId) {
    return isset($_SESSION['favorites']) && in_array($productId, $_SESSION['favorites']);
}


function formatPrice($price) {
    return 'R$ ' . number_format($price, 2, ',', '.');
}
?>


<?php require_once("handlerSelectProdutos.php") ?>
<!-- <h1>Todos os Produtos Cadastrados</h1> -->


<div class="containerProdutos">

    <h1 class="titulo">Explore nossos produtos</h1>

    <p class="titulo-descricao">
        
    </p>

    <div class="products-grid">
        <?php foreach ($produtos as $produto): ?>
            <div class="product-card" data-product-id="<?php echo $produto['proID']; ?>" data-category="<?php echo $produto['proCatID']; ?>">
                <div class="product-image">
                    <img src="<?php echo $produto['proFoto']; ?>"
                        alt="<?php echo htmlspecialchars($produto['proNome']); ?>"
                        loading="lazy">

                    <button class="favorite-btn <?php echo isInFavorites($produto['proID']) ? 'active' : ''; ?>"
                        data-product-id="<?php echo $produto['proID']; ?>">
                        <i class="fas fa-heart"></i>
                    </button>
                </div>

                <div class="product-info">
                    <h3 class="product-name"><?php echo htmlspecialchars($produto['proNome']); ?></h3>
                    <div class="product-price"><?php echo formatPrice($produto['proPreco']); ?></div>

                    <div class="product-actions">
                        <button class="btn-primary add-to-cart-btn"
                            data-product-id="<?php echo $produto['proID']; ?>">
                            <i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho
                        </button>
                        <a href="?page=product&id=<?php echo $produto['proID']; ?>" class="btn-primary">
                            Ver Detalhes
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>


<?php require_once("./utils/footer.php") ?>