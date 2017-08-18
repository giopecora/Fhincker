<?php

namespace App;

use App\Controllers\LoginController;
use App\Models\DAO\LoginDAO;
use Exception;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class App{

    private $controller;
    private $controllerFile;
    private $action;
    private $params;
    public $controllerName;

    public function __construct(){
       /*
        * Constantes do sistema
        */
       define('APP_HOST'       , $_SERVER['HTTP_HOST'] . "/Fhincker");
       define('PATH'           , realpath('./'));
       define('TITLE'          , "Força");
       define('DB_HOST'        , "localhost");
       define('DB_USER'        , "root");
       define('DB_PASSWORD'    , "root");
       define('DB_NAME'        , "rebeldes");
       define('DB_DRIVER'      , "mysql");
       define('MONGO'          , "c:\wamp64\bin\mongo\MongoDB\Server/3.4\bin");
         
       $this->url();
    }
    public function url(){
        
        if( isset($_GET['url']) ){
            $path = $_GET['url'];
            $path = rtrim($path. '/');
            $path = filter_var($path, FILTER_SANITIZE_URL);

            $path = explode('/', $path);

            $this->controller = $this->verificaArray( $path, 0);

            
            $this->action = $this->verificaArray( $path, 1);

            if($this->verificaArray($path,2)){
                unset($path[0]);
                unset($path[1]);
                $this->params = array_values($path);
            }
        }
    }
    
    public function run(){
        
        $signer = new Sha256();
        $loginDAO = new LoginDAO();
        if(isset($_SESSION['id_usuario'])){
            $token = $loginDAO->getToken($_SESSION['id_usuario']);
        }

        if ($this->controller) {
            if(strval($token[0])===$_SESSION['token'] || $this->controller==="Login"){
                $this->controllerName = ucwords($this->controller) . 'Controller';
                $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName);
            }else{
                echo 'Você não está autorizado a acessar essa página';
                exit;   
            }
            $this->controllerName = ucwords($this->controller) . 'Controller';
            $this->controllerName = preg_replace('/[^a-zA-Z]/i', '', $this->controllerName);
        } else {
            $this->controllerName = "LoginController";
        }

        $this->controllerFile   = $this->controllerName . '.php';
        $this->action           = preg_replace('/[^a-zA-Z]/i', '', $this->action);

        if (!$this->controller) {
            $this->controller = new LoginController($this);
            $this->controller->index();
        }

        if (!file_exists(PATH . '/App/Controllers/' . $this->controllerFile)) {
            throw new Exception("Página não encontrada.", 404);
        }

        $nomeClasse     = "\\App\\Controllers\\" . $this->controllerName;
        $objetoController = new $nomeClasse($this);

        if (!class_exists($nomeClasse)) {
            throw new Exception("Erro na aplicação", 500);
        }

        if (method_exists($objetoController, $this->action)) {
            
            $objetoController->{$this->action}($this->params);
            return;
        } else if (!$this->action && method_exists($objetoController, 'index')) {
            $objetoController->index($this->params);
            return;
        } else {
            
            throw new Exception("Nosso suporte já esta verificando desculpe!", 500);
        }
    }
    public function getControllerName(){
        return $this->controllerName;   
    }
    public function verificaArray($path, $posicao){
        return $path[$posicao];
    }

}