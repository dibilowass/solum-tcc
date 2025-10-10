<?php

require_once "config/db.php";
require_once "model/Loja.php"; 


$db = new Database();
$conn = $db->getConnection();

$lojaModel = new Loja($conn);

try {
    
    $stmt = $lojaModel->readAll();
    $lojas = $stmt->fetchAll(PDO::FETCH_ASSOC); 

} catch (PDOException $error) {
    echo "Erro na consulta: " . $error->getMessage();
    $lojas = []; 
}
