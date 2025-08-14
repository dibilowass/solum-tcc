<?php

require_once "config/db.php";
require_once "model/Loja.php"; // Corrigir para carregar a classe Loja

// Conexão com BD
$db = new Database();
$conn = $db->getConnection();

$lojaModel = new Loja($conn); // Passa o objeto PDO para Loja

try {
    // Usar método do modelo para pegar todas as lojas
    $stmt = $lojaModel->readAll();
    $lojas = $stmt->fetchAll(PDO::FETCH_ASSOC); // Busca todas como array associativo

} catch (PDOException $error) {
    echo "Erro na consulta: " . $error->getMessage();
    $lojas = []; // garante que $lojas sempre esteja definido
}
