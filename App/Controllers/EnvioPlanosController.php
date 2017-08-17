<?php 

namespace App\Controllers;
use Lcobucci\JWT\Builder;
use App\Lib\AES;
use App\Models\DAO\NavesDAO;


 
class EnvioPlanosController extends Controller{

    public function index(){
        $this->render('envioPlanos/index');
    }
    
    public function importar(){
        $this->importarNaves();
        //$this->importarSoldados();
    }
    public function importarNaves(){
        //var_dump($_FILES["arq2"]);exit;
        $file = fopen($_FILES["arq2"]["tmp_name"], "r");
        $result = array();
        $i = 0;
        $naves = new NavesDAO();
        while (!feof($file)){
           if (substr(($value = utf8_encode(fgets($file))), 0, 5) !== ';;;;;') {
               $value = explode(";", $value);
               if($i>0){
                $naves->gravar($value[0],$value[1],$value[2],$value[3],$value[4],$value[5]);
               }
               $result[$i][0] = $value[0];
               $result[$i][1] = $value[1];
               $result[$i][2] = $value[2];
               $result[$i][3] = $value[3];
               $result[$i][4] = $value[4];
               $result[$i][5] = $value[5];
               
              $i++;
           }
        }
        fclose($file);
        var_dump($result);
    }
    public function  importarSoldados(){
        $client = new \MongoDB\Client();
        $collection = $client->soldados;
        $uploaddir =__DIR__.  "\uploads/";
        
        $uploadfile = $uploaddir . basename($_FILES["arq1"]["name"]);
        var_dump($_FILES);
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
            var_dump($command);
            chdir('c:\wamp64\bin\mongo\MongoDB\Server\3.4\bin');
            shell_exec($command);    
        }
          
    }
    
   
}