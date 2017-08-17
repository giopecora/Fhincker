<?php

namespace App\Models\DAO;



class NaveRebeldeDAO extends BaseDAO{
    public function gravar($nome_nave,$qtd_naves,$potencial,$potencial_planos)
    {
        try {
            
            $query = $this->insert(
                "INSERT INTO navesrebeldes (nome_nave, qtd_naves, potencial, potencial_planos) 
                 values ('$nome_nave' , '$qtd_naves' , '$potencial', '$potencial_planos')");
       }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
    public function potencial($nome_nave)
    {
        try {
            
            $query = $this->select(
                "SELECT potencial, potencial_planos, qtd_naves FROM navesrebeldes WHERE nome_nave = '$nome_nave'"
            );
            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
   
}