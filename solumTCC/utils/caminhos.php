<?php

require_once __DIR__ . "/../config/db.php";
require_once __DIR__ . "/../model/Produto.php";
require_once __DIR__ . "/../model/Loja.php";
require_once __DIR__ . "/../model/Categoria.php";

$db = null;

if (class_exists('Database')) {
    $db = (new Database())->getConnection();
}


$segments = [];
$script = basename($_SERVER['PHP_SELF']);


$map = [
    'index.php' => 'Home',
    'explorar-produtos.php' => 'Produtos',
    'explorar-categorias.php' => 'Categorias',
    'produto.php' => 'Produto',
    'perfil-loja.php' => 'Loja',
    'lojas.php' => 'Lojas',
    'cadastro.php' => 'Cadastro',
    'login.php' => 'Login',
    'carrinho.php' => 'Carrinho',
    'sobre-nos.php' => 'Sobre' 
];


$segments[] = ['label' => 'Home', 'url' => 'index.php'];


if ($script !== 'index.php') {
   
    if ($script === 'produto.php') {
       
        $segments[] = ['label' => 'Produtos', 'url' => 'explorar-produtos.php'];

        if (isset($_GET['proID']) && $db) {
            $proID = intval($_GET['proID']);
            $stmt = $db->prepare('SELECT proNome, proCatID FROM produtos WHERE proID = :id LIMIT 1');
            $stmt->bindParam(':id', $proID, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($row) {
                    $proNome = $row['proNome'] ?? null;
                    $proCatID = !empty($row['proCatID']) ? intval($row['proCatID']) : null;

                    // Se houver categoria, adiciona o nível de categoria
                    if ($proCatID) {
                        if ($db) {
                            $catStmt = $db->prepare('SELECT catNome FROM categoria WHERE catID = :id LIMIT 1');
                            $catStmt->bindParam(':id', $proCatID, PDO::PARAM_INT);
                            if ($catStmt->execute()) {
                                $catRow = $catStmt->fetch(PDO::FETCH_ASSOC);
                                if ($catRow && !empty($catRow['catNome'])) {
                                    $segments[] = ['label' => $catRow['catNome'], 'url' => "explorar-categorias.php?catID={$proCatID}"];
                                } else {
                                    $segments[] = ['label' => 'Categoria', 'url' => "explorar-categorias.php?catID={$proCatID}"];
                                }
                            }
                        } else {
                            $segments[] = ['label' => 'Categoria', 'url' => "explorar-categorias.php?catID={$proCatID}"];
                        }
                    }

                    // Finalmente o nome do produto (último nível)
                    if (!empty($proNome)) {
                        $segments[] = ['label' => $proNome, 'url' => "produto.php?proID={$proID}"];
                    } else {
                        $segments[] = ['label' => 'Produto', 'url' => "produto.php?proID={$proID}"];
                    }
                }
            }
        } else {
            // Sem proID ou sem DB: exibe só o rótulo genérico
            $segments[] = ['label' => 'Produto', 'url' => 'produto.php'];
        }
    }

    // Página de perfil da loja: Home > Lojas > Loja
    elseif ($script === 'perfil-loja.php') {
        $segments[] = ['label' => 'Lojas', 'url' => 'lojas.php'];
        if (isset($_GET['lojID']) && $db) {
            $lojID = intval($_GET['lojID']);
            $loja = new Loja($db);
            $row = $loja->readById($lojID);
            if ($row && !empty($row['lojNome'])) {
                $segments[] = ['label' => $row['lojNome'], 'url' => "perfil-loja.php?lojID={$lojID}"];
            } else {
                $segments[] = ['label' => 'Loja', 'url' => "perfil-loja.php?lojID={$lojID}"];
            }
        } else {
            $segments[] = ['label' => 'Loja', 'url' => 'perfil-loja.php'];
        }
    }

    // Explorar categorias: Home > Categorias > Categoria
    elseif ($script === 'explorar-categorias.php') {
        $segments[] = ['label' => 'Categorias', 'url' => 'explorar-categorias.php'];
        if (isset($_GET['catID']) && $db) {
            $catID = intval($_GET['catID']);
            $cat = new Categoria($db);
            $row = $cat->getCategoryByID($catID);
            if ($row && !empty($row['catNome'])) {
                $segments[] = ['label' => $row['catNome'], 'url' => "explorar-categorias.php?catID={$catID}"];
            } else {
                $segments[] = ['label' => 'Categoria', 'url' => "explorar-categorias.php?catID={$catID}"];
            }
        }
    }

    // Outros scripts mapeados simples
    else {
        if (isset($map[$script])) {
            $segments[] = ['label' => $map[$script], 'url' => $script];
        } else {
            $segments[] = ['label' => ucfirst(pathinfo($script, PATHINFO_FILENAME)), 'url' => $script];
        }
    }
}

// Renderiza breadcrumb
echo "<nav class=\"caminhos\">";
foreach ($segments as $i => $seg) {
    $isLast = ($i === count($segments) - 1);
    if (!$isLast) {
        echo "<a href=\"{$seg['url']}\">{$seg['label']}</a> / ";
    } else {
        echo "<span>" . htmlspecialchars($seg['label']) . "</span>";
    }
}
echo "</nav>";

?>
