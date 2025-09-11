<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_set_cookie_params([
    'lifetime' => 0,                
    'path' => '/',
    'domain' => 'solum.hubsapiens.com.br',
    'secure' => true,              
    'httponly' => true,           
    'samesite' => 'Lax'           
]);

session_start();

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>
<?php


require_once "config/db.php";
require_once "model/Produto.php";
require_once "model/Categoria.php";


require_once("./utils/header.php");
if (isset($_SESSION['usuID'])) {
    
    require_once( "./utils/navbar_logado.php");
} else {
   
    require_once( "./utils/navbar_nao-logado.php");
}

// Conexão com o banco de dados
$database = new Database();
$db = $database->getConnection();

// Instanciando os modelos
$produto = new Produto($db);
$categoria = new Categoria($db);

// Pega o catID do GET
if (isset($_GET['catID']) && is_numeric($_GET['catID'])) {
    $catID = intval($_GET['catID']);
    
    // Busca os produtos da categoria
    $stmt = $produto->readByCategory($catID);
    $num = $stmt->rowCount();

    // Busca o nome da categoria
    $categoriaInfo = $categoria->getCategoryByID($catID);
    if ($categoriaInfo) {
        $catNome = $categoriaInfo['catNome']; // Nome da categoria
    } else {
        echo "<p>Categoria não encontrada.</p>";
        exit;
    }

    if ($num > 0) {
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $produtos = [];
        echo "<p>Nenhum produto encontrado para essa categoria.</p>";
    }
} else {
    echo "<p>Categoria inválida.</p>";
    exit;
}
?>


    <h1>Produtos da Categoria: <?php echo htmlspecialchars($catNome); ?></h1>

    <?php if (!empty($produtos)) : ?>
        <ul>
            <?php foreach ($produtos as $produto) : ?>
                <li>
                    <strong><?php echo htmlspecialchars($produto['proNome']); ?></strong><br>
                    Preço: R$ <?php echo number_format($produto['proPreco'], 2, ',', '.'); ?><br>
                    Descrição: <?php echo htmlspecialchars($produto['proDescricao']); ?><br>
                    <!-- Exemplo de imagem -->
                    <?php if (!empty($produto['proFoto'])): ?>
                        <img src="path/para/imagens/<?php echo $produto['proFoto']; ?>" alt="<?php echo htmlspecialchars($produto['proNome']); ?>" width="100">
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php require_once("utils/footer.php");
