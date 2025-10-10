<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('session.cookie_secure', 1);
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_samesite', 'Lax');
session_start();
?>


<?php require_once("./utils/header.php"); ?>
<?php
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

    
    <form method="GET" action="explorar-produtos.php" class="filters-form" style="margin-bottom:16px; display:flex; gap:12px; flex-wrap:wrap; align-items:center;">
       

        <select name="catID" style="padding:8px; border:1px solid #ddd; border-radius:6px;">
            <option value="">Todas as categorias</option>
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat['catID'] ?>" <?= (isset($_GET['catID']) && $_GET['catID']==$cat['catID']) ? 'selected' : '' ?>><?= htmlspecialchars($cat['catNome']) ?></option>
            <?php endforeach; ?>
        </select>

        <select name="lojID" style="padding:8px; border:1px solid #ddd; border-radius:6px;">
            <option value="">Todas as lojas</option>
            <?php foreach ($lojas as $loj): ?>
                <option value="<?= $loj['lojID'] ?>" <?= (isset($_GET['lojID']) && $_GET['lojID']==$loj['lojID']) ? 'selected' : '' ?>><?= htmlspecialchars($loj['lojNome']) ?></option>
            <?php endforeach; ?>
        </select>

        <input type="number" step="0.01" name="minPrice" placeholder="Preço mínimo" value="<?= isset($_GET['minPrice']) ? htmlspecialchars($_GET['minPrice']) : '' ?>" style="width:130px; padding:8px; border:1px solid #ddd; border-radius:6px;">
        <input type="number" step="0.01" name="maxPrice" placeholder="Preço máximo" value="<?= isset($_GET['maxPrice']) ? htmlspecialchars($_GET['maxPrice']) : '' ?>" style="width:130px; padding:8px; border:1px solid #ddd; border-radius:6px;">

        <select name="sort" style="padding:8px; border:1px solid #ddd; border-radius:6px;">
            <option value="">Ordenar</option>
            <option value="price_asc" <?= (isset($_GET['sort']) && $_GET['sort']=='price_asc') ? 'selected' : '' ?>>Preço: menor para maior</option>
            <option value="price_desc" <?= (isset($_GET['sort']) && $_GET['sort']=='price_desc') ? 'selected' : '' ?>>Preço: maior para menor</option>
            <option value="newest" <?= (isset($_GET['sort']) && $_GET['sort']=='newest') ? 'selected' : '' ?>>Novos</option>
            <option value="oldest" <?= (isset($_GET['sort']) && $_GET['sort']=='oldest') ? 'selected' : '' ?>>Antigos</option>
        </select>

        <button type="submit" class="btn btn-primary">Filtrar</button>
        <a href="explorar-produtos.php" class="btn btn-secondary" style="margin-left:6px;">Limpar</a>
    </form>

    <div class="products-grid">
        <?php foreach ($produtos as $produto): ?>
            <div class="product-card" data-product-id="<?php echo $produto['proID']; ?>" data-category="<?php echo $produto['proCatID']; ?>">
                <div class="product-image">
                    <img src="<?php echo $produto['proFoto']; ?>"
                        alt="<?php echo htmlspecialchars($produto['proNome']); ?>"
                        loading="lazy">

                    <button class="favorite-btn <?php echo isInFavorites($produto['proID']) ? 'active' : ''; ?>"
                        data-product-id="<?php echo $produto['proID']; ?>">
                        <i class="bi bi-bookmarks"></i>
                    </button>
                </div>

                <div class="product-info">
                    <h3 class="product-name"><?php echo htmlspecialchars($produto['proNome']); ?></h3>
                    <div class="product-price"><?php echo formatPrice($produto['proPreco']); ?></div>

                    <div class="product-actions">
                        <!-- <button class="btn-primary add-to-cart-btn" id="addCarrinho"
                            data-product-id="<php echo $produto['proID']; ?>">
                            <i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho
                        </button> -->
                        <a href="produto.php?proID=<?php echo $produto['proID']; ?>" class="btn-primary">
    Ver Detalhes
</a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>


<?php require_once("./utils/footer.php") ?>
