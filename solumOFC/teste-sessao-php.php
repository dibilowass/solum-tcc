<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if (session_status() !== PHP_SESSION_ACTIVE) {
    die("Sessão NÃO pôde ser iniciada.");
}

if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
} else {
    $_SESSION['contador']++;
}

echo "Contador de sessões: " . $_SESSION['contador'];
?>
