<?php
// Inicie a sessão (sempre antes de usar session_*)
session_start();

// Só chame session_destroy se a sessão estiver ativa
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

// Redirecione para a página desejada (login, home, etc)
header("Location: index.php");
exit;