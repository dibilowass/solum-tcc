<?php 

require_once("Loja.php");

class Produto extends Loja{
    private $conn;
    private $table_name = "produtos";

    //Atributos

    public $proID;
    public $proNome;
    public $proFoto;
    public $proFoto1;
    public $proFoto2;
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


}