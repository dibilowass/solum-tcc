<?php 



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "config/db.php";
require_once "model/Usuario.php";

// Cria a conexão com PDO
$database = new Database();
$conn = $database->getConnection();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $usuNome = $_POST['nome'];
    $usuEmail = $_POST['email'];
    $usuSenha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografa a senha
   

    // Query com PDO
    $sql = "INSERT INTO usuarios (usuNome, usuEmail, usuSenha)
            VALUES (:nome, :email, :senha)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nome', $usuNome);
    $stmt->bindParam(':email', $usuEmail);
    $stmt->bindParam(':senha', $usuSenha); // Já está criptografada
    

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Usuário cadastrado com sucesso! <a href='index.php'> Voltar. </a></div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar: " . implode(" | ", $stmt->errorInfo()) . "</div>";
    }
}
?>
