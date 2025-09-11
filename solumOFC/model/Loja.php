<?php 

class Loja{
    private $conn;
    private $table_name = "lojas";

    //atributos

    public $lojId;
    public $lojNome;
    public $lojDescricao;
    public $lojLogo;

    //construtor

    public function __construct($db){

    $this -> conn = $db;

    }

    public function readAll(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt -> execute();
        return $stmt;
    }

    public function readById($id) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE lojID = :id LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC); 
}
}

