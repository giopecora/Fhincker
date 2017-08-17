<?php

namespace App\Models\Entidades;

class Rebeldes{

    public $potencialSemPlano;
    public $potencialComPlano;
    

    public function __construct($potencialSemPlano, $potencialComPlano){
        $this->potencialSemPlano = floatval($potencialSemPlano);
        $this->potencialComPlano = floatval($potencialComPlano);
    }
}