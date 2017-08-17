<?php 

namespace App\Controllers;
use App\Models\DAO\SoldadoDAO;
use App\Models\DAO\NaveRebeldeDAO;
use App\Models\DAO\NaveImperioDAO;
use App\Models\Entidades\Rebeldes;
use App\Models\Entidades\NaveImperio;
 
class DadosPlanosController extends Controller{
    public function index(){
        
        $rebeldesDao = new NaveRebeldeDAO();
        
        /*REBELDES*/
        $dados = $rebeldesDao->potencial('Cruzador Estelar Mon Calamari');
        $this->cruzador = new Rebeldes($dados);
        $dados = $rebeldesDao->potencial('Caça estelar B-wing');
        $this->bwing = new Rebeldes($dados);
        $dados = $rebeldesDao->potencial('Caça estelar X-wing T-65');
        $this->xwing = new Rebeldes($dados);
        $dados = $rebeldesDao->potencial('Sombra Furtiva');
        $this->sombra = new Rebeldes($dados);

        /*NAVES IMPERIO*/
        $naveImperioDao = new NaveImperioDAO();
       
        
        $dados = $naveImperioDao->potencial('BC1743652');
        $this->fragataEndor = new NaveImperio($dados[0], $dados[1], $dados[2] ,$dados[3], $dados[4], $dados[5]);

        $dados = $naveImperioDao->potencial('WA1551849');    
        $this->fragataKash = new NaveImperio($dados[0], $dados[1], $dados[2] ,$dados[3], $dados[4], $dados[5]);

        $this->fragata = ($this->fragataKash->ship_potential + $this->fragataEndor->ship_potential)/2;


        $dados = $naveImperioDao->potencial('NV239016');    
        $this->gozantiHoth = new NaveImperio($dados[0], $dados[1], $dados[2] ,$dados[3], $dados[4], $dados[5]);

        $dados = $naveImperioDao->potencial('PA1263327');    
        $this->gozantiCoruscant = new NaveImperio($dados[0], $dados[1], $dados[2] ,$dados[3], $dados[4], $dados[5]);

        $dados = $naveImperioDao->potencial('YT1320666');    
        $this->gozantiKamino = new NaveImperio($dados[0], $dados[1], $dados[2] ,$dados[3], $dados[4], $dados[5]);

        $this->gozanti = ($this->gozantiKamino->ship_potential + $this->gozantiCoruscant->ship_potential + $this->gozantiHoth->ship_potential)/3;

        $dados = $naveImperioDao->potencial('RP3587108');    
        $this->tranpMedio = new NaveImperio($dados[0], $dados[1], $dados[2] ,$dados[3], $dados[4], $dados[5]);

        $dados = $naveImperioDao->potencial('FD2438584');    
        $this->destroier = new NaveImperio($dados[0], $dados[1], $dados[2] ,$dados[3], $dados[4], $dados[5]);


                
        
        
        
        $this->render('dados/index');
    }
}