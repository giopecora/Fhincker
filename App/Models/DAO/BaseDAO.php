<?php

namespace App\Models\DAO;
use App\Lib\Conexao;

abstract class BaseDAO{
    private $conexao;

    public function _construct(){
        $this->conexao = Conexao::getConnection();
    }
    public function select($sql){
        $this->conexao = Conexao::getConnection();
        
        if(!empty($sql)){
            return $this->conexao->query($sql);
        }
    }
    public function insert($sql){
        $this->conexao = Conexao::getConnection();
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }
     public function update($sql){
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount();
    }
}