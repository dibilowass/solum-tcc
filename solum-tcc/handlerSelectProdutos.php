<?php

require_once "config/db.php";
require_once "model/Produto.php";

//Conexão com BD

$db = new Database();
$conn = $db->getConnection();

$produtoModel = new Produto($conn); // Passa o objeto PDO para Loja

try {
    // Usar método do modelo para pegar todas as lojas
    $stmt = $produtoModel->readAll();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Busca todas como array associativo

} catch (PDOException $error) {
    echo "Erro na consulta: " . $error->getMessage();
    $produtos = []; // garante que $lojas sempre esteja definido
}


?>