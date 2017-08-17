<?php 

namespace App\Controllers;
use Lcobucci\JWT\Builder;
use App\Lib\AES;
use App\Models\DAO\NavesDAO;
use App\Models\Entidades\Naves;


 
class EnvioPlanosController extends Controller{

    public function index(){
        $this->render('envioPlanos/index');
    }
    
    public function importar(){
        $this->importarSoldados();
        $this->importarNaves();
        $this->redirect('/envioPlanos');
    }

    public function importarNaves(){
        $file = fopen($_FILES["arq2"]["tmp_name"], "r");
        $result = array();
        $i = 0;
        $naves = new NavesDAO();
        while (!feof($file)){
            if (substr(($value = utf8_encode(fgets($file))), 0, 5) !== ';;;;;') {
                $value = str_replace(',','.',$value);
                $value = explode(";", $value);
                if($i>0){
                $nave = new Naves($value[0],$value[1],$value[2],$value[3],$value[4],$value[5]);
                $naves->gravar($nave);
                }
            $i++;
            }
        }
        fclose($file);
    }
    public function  importarSoldados(){
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
            chdir(MONGO);
            shell_exec($command);   

            
            $pasta = "\uploads/";
            $pasta = PATH . "/App/Controllers/uploads/";
            
            if(is_dir($pasta)){
                $diretorio = dir($pasta);
                while($arquivo = $diretorio->read()){
                    if(($arquivo != '.') && ($arquivo != '..')){
                        unlink($pasta.$arquivo);
                    }
                }
                $diretorio->close();
            }
        }
    }
 
}