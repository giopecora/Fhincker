<?php 

namespace App\Controllers;
use App\Models\DAO\LoginDAO;
use App\Lib\Erro;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;


 
class LoginController extends Controller{
    public function index(){
        $this->render('login/index');
    }
    public function validar(){
       // Sessao::gravaFormulario($_POST);
       $_SESSION['mensagemLogin']="";
        $loginDAO = new LoginDAO();

        $id = $loginDAO->autentica($_POST['usuario'], $_POST['senha']);
        $_POST['usuario']=""; 
        $_POST['senha']="";
        if($id){
            
            $signer = new Sha256();
            $token = (new Builder())->setIssuer('http://example.com') // Configures the issuer (iss claim)
                                    ->setAudience('http://example.org') // Configures the audience (aud claim)
                                    ->setId('4f1g23a12aa', true) // Configures the id (jti claim), replicating as a header item
                                    ->setIssuedAt(time()) // Configures the time that the token was issue (iat claim)
                                    ->setNotBefore(time() + 60) // Configures the time that the token can be used (nbf claim)
                                    ->setExpiration(time() + 3600) // Configures the expiration time of the token (nbf claim)
                                    ->set('uid', 1) // Configures a new claim, called "uid"
                                    ->sign($signer, 'yoda') 
                                    ->getToken(); // Retrieves the generated token
            
            
            $loginDAO->atualizaToken(strval($id[0]),$token);
            $_SESSION['token'] = strval($token);
            $_SESSION['id_usuario'] = strval($id[0]);
            var_dump("teste");
            $this->redirect('/envioPlanos');

        }else{
            $_SESSION['mensagemLogin'] = "Login e\ou Senha incorreta";
            $this->redirect('/Login');
        }

        /*if($usuarioDAO->verificaEmail($_POST['email'])){
            Sessao::gravaMensagem("Email existente");
            $this->redirect('/usuario/cadastro');
        }

        if($usuarioDAO->salvar($Usuario)){
            $this->redirect('/usuario/sucesso');
        }else{
            Sessao::gravaMensagem("Erro ao gravar");
        }*/
    }

   
}