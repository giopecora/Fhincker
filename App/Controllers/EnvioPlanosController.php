<?php 

namespace App\Controllers;
use Lcobucci\JWT\Builder;
use App\Lib\AES;


 
class EnvioPlanosController extends Controller{

    public function index(){
        $this->render('envioPlanos/index');
    }
    
    public function importar(){
                
        
        $client = new \MongoDB\Client();
        $collection = $client->soldados;
        $uploaddir =__DIR__.  "\uploads/";
        $uploadfile = $uploaddir . basename($_FILES["arq1"]["name"]);
        
        if (move_uploaded_file($_FILES["arq1"]["tmp_name"], $uploadfile)){
          
            $dados = file_get_contents($uploadfile);
            $dados = str_replace(',','.',$dados);
            $dados = str_replace(';',',',$dados);
            $dados = str_replace(',,','',$dados);

            $uploadfile = $uploaddir . "arquivoFormatado.csv";
            $file = fopen($uploadfile, 'a');
            fwrite($file, $dados);
            fclose($file);

            $command = "mongoimport --db imperio --collection " . $collection . " --file " . $uploadfile ." --type csv --headerline" ;
            chdir('c:\wamp64\bin\mongo\MongoDB\Server\3.4\bin');
            shell_exec($command);
        }
          
    }
    
   
}