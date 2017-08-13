<?php

namespace App\Models\DAO;


class LoginDAO extends BaseDAO{
    public function autentica($login, $senha)
    {
        
        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE login = '$login' AND senha='$senha' "
            );
            
            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
   
}