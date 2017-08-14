<?php 

namespace App\Controllers;
use Lcobucci\JWT\Builder;
use App\Lib\AES;


 
class EnvioPlanosController extends Controller{
    public function index(){

        $arq1 = file_get_contents("C:\Users\dea\Downloads\ship_data.AES\ship_data.AES");
        $aes = new AES('69273056544e6b662d2b716a65');
        var_dump($aes->decrypt($arq1));
        
        $this->render('envioPlanos/index');
    }
    
   
}