<?php 

namespace App\Models\Entidades;

class Servico{
private $idServico;
private $nome;
private $preco;
private $Cargo_idCargo;


public function getIdServico(){
    return $this->idServico;
}

public function setIdServico($idServico){
    $this->idServico = $idServico;
}

public function getNome(){
    return $this->nome;
}

public function setNome($nome){
    $this->nome = $nome;
}

public function getPreco(){
    return $this->preco;
}

public function setPreco($preco){
    $this->preco = $preco;
}

public function getCargo_idCargo(){
    return $this->Cargo_idCargo;
}

public function setCargo_idCargo($Cargo_idCargo){
    $this->Cargo_idCargo = $Cargo_idCargo;
}

}
?>