<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['usuID'])) {
    echo json_encode(['error' => 'Usuário não está logado.']);
    exit;
}

if (!isset($_POST['product_id'])) {
    echo json_encode(['error' => 'ID do produto não foi enviado.']);
    exit;
}

$productId = intval($_POST['product_id']);

if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

if (in_array($productId, $_SESSION['favorites'])) {
    $_SESSION['favorites'] = array_diff($_SESSION['favorites'], [$productId]);
    $status = 'removed';
} else {
    $_SESSION['favorites'][] = $productId;
    $status = 'added';
}

echo json_encode(['status' => $status]);
