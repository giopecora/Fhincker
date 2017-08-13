<?php 

namespace App\Controllers;
use Lcobucci\JWT\Builder;



 
class EnvioPlanosController extends Controller{
    public function index(){
        $this->render('envioPlanos/index');
    }
    
   
}