<?php 

namespace App\Controllers;
use Lcobucci\JWT\Builder;
use App\Lib\AES;
use App\Models\DAO\NaveImperioDAO;
use App\Models\Entidades\NaveImperio;
use App\Models\DAO\SoldadoDAO;
use App\Models\DAO\NaveRebeldeDAO;


 
class EnvioPlanosController extends Controller{

    public function index(){
        $this->render('envioPlanos/index');
    }
    
    public function importar(){
        $this->importarSoldados();
        $this->importarNavesImperio();
        $this->gravarDadosRebeldes();
        $this->redirect('/dadosPlanos');
    }

    public function gravarDadosRebeldes(){
        $soldadoDao = new SoldadoDAO();
        $naveRebeldeDao = new NaveRebeldeDAO();

        $countFragata = $soldadoDao->countNavesImperio(["1"=>"BC1743652","2"=>"WA1551849"]);
        $countCruzador = $soldadoDao->countNavesImperio(["1"=>"NV239016","2"=>"PA1263327","3"=>"YT1320666"]);
        $countDetroier = $soldadoDao->countNavesImperio(["1"=>"FD2438584"]);
        $countTranspMedio = $soldadoDao->countNavesImperio(["1"=>"RP3587108"]);

        $naveRebeldeDao->gravar("Cruzador Estelar Mon Calamari", $countFragata, 40, 40+35);
        $naveRebeldeDao->gravar("Caça estelar B-wing", $countCruzador, 56, 56+30);
        $naveRebeldeDao->gravar("Caça estelar X-wing T-65", $countDetroier, 72, 72+15);
        $naveRebeldeDao->gravar("Sombra Furtiva", $countTranspMedio, 48, 48+10);
    }

    public function importarNavesImperio(){
        $file = fopen($_FILES["arq2"]["tmp_name"], "r");
        $result = array();
        $i = 0;
        $navesImperioDao = new NaveImperioDAO();
        while (!feof($file)){
            if (substr(($value = utf8_encode(fgets($file))), 0, 5) !== ';;;;;') {
                $value = str_replace(',','.',$value);
                $value = explode(";", $value);
                if($i>0){
                $naveImperio = new NaveImperio($value[0],$value[1],$value[2],$value[3],$value[4],$value[5]);
                $navesImperioDao->gravar($naveImperio);
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