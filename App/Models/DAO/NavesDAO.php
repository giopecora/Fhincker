<?php

namespace App\Models\DAO;


class NavesDAO extends BaseDAO{
    public function gravar($numero_serial_da_nave, $tipo_da_nave, $comandante_responsavel, $localizacao_planeta, $localizacao_orla, $ship_potential)
    {
        try {
            
            $query = $this->insert(
                "INSERT INTO naves (numero_serial_da_nave, tipo_da_nave, comandante_responsavel, localizacao_planeta, localizacao_orla, ship_potential) values ('$numero_serial_da_nave' , '$tipo_da_nave' , '$comandante_responsavel' , '$localizacao_planeta',  '$localizacao_orla' ,  '$ship_potential')");
            

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
  
   
}