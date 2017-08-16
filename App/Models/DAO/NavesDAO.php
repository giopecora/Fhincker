<?php

namespace App\Models\DAO;


class LoginDAO extends BaseDAO{
      
      public  function salvar(Usuario $usuario) {
        try {
            $nome      = $usuario->getNome();
            $email     = $usuario->getEmail();
            return $this->insert(
            'usuario',
            ":nome,:email",
            [
            ':nome'=>$nome,
            ':email'=>$email
            ]
        );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }
   
}