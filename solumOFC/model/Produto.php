<?php 

require_once("Loja.php");

class Produto extends Loja{
    private $conn;
    private $table_name = "produtos";

    //Atributos

    public $proID;
    public $proNome;
    public $proFoto;
    public $proFoto2;
    public $proFoto3;
    public $proDescricao;
    public $proPreco;
    public $proQuantEstoque;
    public $proCatID;
    public $proLojaID;
 
   
    //Construtor

    public function __construct($db){
    
        $this->conn = $db;
    
    }

    //listar todos os valores da tbl produto

    public function readAll(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function getProduct(){
    $query = "SELECT * FROM  . $this->table_name . WHERE proID = :proID";
    
   
    }

    
    public function getLoja($proLojaID) {
    $query = "SELECT lojNome FROM lojas WHERE lojID = :proLojaID";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':proLojaID', $proLojaID);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['lojNome'] : 'Loja não encontrada';
}

public function getLatest() {
    $query = "SELECT * FROM  produtos  LIMIT 4";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}




public function buscarProdutos($termo) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE proNome LIKE :termo";
    $stmt = $this->conn->prepare($query);
    $termo = "%" . $termo . "%";
    $stmt->bindParam(':termo', $termo);
    $stmt->execute();
    return $stmt;
}

public function getFavoritos($ids) {
    if (empty($ids)) return [];

    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $query = "SELECT * FROM " . $this->table_name . " WHERE proID IN ($placeholders)";
    $stmt = $this->conn->prepare($query);
    foreach ($ids as $index => $id) {
        $stmt->bindValue($index + 1, $id, PDO::PARAM_INT);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}