<?php

namespace App\Models\DAO;



class NaveImperioDAO extends BaseDAO{
    public function gravar($nave)
    {
        try {
            
            $query = $this->insert(
                "INSERT INTO navesimperio (numero_serial_da_nave, tipo_da_nave, comandante_responsavel, localizacao_planeta, localizacao_orla, ship_potential) 
                 values ('$nave->numero_serial_da_nave' , '$nave->tipo_da_nave' , '$nave->comandante_responsavel' , '$nave->localizacao_planeta',  '$nave->localizacao_orla' ,  '$nave->ship_potential')");
       }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
    public function potencial($numero_serial_da_nave)
    {
        try {
            
            $query = $this->select(
                "SELECT * FROM navesimperio WHERE numero_serial_da_nave = '$numero_serial_da_nave'"
            );
            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
  
   
}