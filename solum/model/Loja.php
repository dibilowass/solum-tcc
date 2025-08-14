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
}

