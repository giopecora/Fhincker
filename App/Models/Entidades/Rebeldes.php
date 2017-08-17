<?php

namespace App\Models\Entidades;

class Rebeldes{

    public $potencialSemPlano;
    public $potencialComPlano;
    public $qtd_naves;
    

    public function __construct($dados){
        $this->potencialSemPlano = floatval($dados[0]);
        $this->potencialComPlano = floatval($dados[1]);
        $this->qtd_naves = $dados[2];
    }
}