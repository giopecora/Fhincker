<?php 

namespace App\Controllers;
use App\Models\DAO\SoldadoDAO;
use App\Models\DAO\NaveRebeldeDAO;
use App\Models\Entidades\Rebeldes;
 
class DadosPlanosController extends Controller{
    public function index(){
        
        $rebeldesDao = new NaveRebeldeDAO();
        $this->cruzador = new Rebeldes(
            $rebeldesDao->potencialSemPlano('Cruzador Estelar Mon Calamari')[0],
            $rebeldesDao->potencialComPlano('Cruzador Estelar Mon Calamari')[0]
        );
        $this->bwing = new Rebeldes(
            $rebeldesDao->potencialSemPlano('Caça estelar B-wing')[0],
            $rebeldesDao->potencialComPlano('Cruzador Estelar Mon Calamari')[0]
        );
        $this->xwing = new Rebeldes(
            $rebeldesDao->potencialSemPlano('Caça estelar X-wing T-65')[0],
            $rebeldesDao->potencialComPlano('Caça estelar X-wing T-65')[0]
        );
        $this->sombra = new Rebeldes(
            $rebeldesDao->potencialSemPlano('Sombra Furtiva')[0],
            $rebeldesDao->potencialComPlano('Sombra Furtiva')[0]
        );

        
        $this->render('dados/index');
    }
}