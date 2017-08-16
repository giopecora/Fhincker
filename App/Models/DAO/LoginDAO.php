<?php

namespace App\Models\DAO;


class LoginDAO extends BaseDAO{
    public function autentica($login, $senha)
    {
        try {
            
            $query = $this->select(
                "SELECT id_usuario FROM usuario WHERE login = '$login' AND senha='$senha' "
            );
            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
    public function getToken($id)
    {
        
        try {

            $query = $this->select(
                "SELECT token FROM usuario WHERE id_usuario = '$id'" 
            );
            
            return $query->fetch();

        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
   
    public function atualizaToken($id, $token)
    {
         try {

            $query = $this->update(
                "UPDATE usuario SET token = '$token' WHERE id_usuario = '$id'" 
            );
        }catch (Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
   
}