<?php

namespace App\Models\Entidades;

class Usuario{

    private $id;
    private $nome;
    private $senha;

    public function getId(){
        return $this->id;    
    }
    public function setId($id){
        $this->id;
    }

    public function getNome(){
        return $this->nome;    
    }
    public function setNome($nome){
        $this->nome;
    }

    
    public function getsenha(){
        return $this->senha;    
    }
    public function setsenha($senha){
        $this->senha;
    }
}