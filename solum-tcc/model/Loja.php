<?php 

class Loja {
    private $conn;
    private $table_name = "lojas";

    public $lojId;
    public $lojNome;
    public $lojDescricao;
    public $lojLogo;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT lojID, lojNome, lojDescricao, lojLogo FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
