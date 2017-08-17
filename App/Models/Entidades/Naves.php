<?php

namespace App\Models\Entidades;

class Naves{

    public $numero_serial_da_nave;
    public $tipo_da_nave;
    public $comandante_responsavel;
    public $localizacao_planeta;
    public $localizacao_orla;
    public $ship_potential;

    public function __construct($numero_serial_da_nave, $tipo_da_nave, $comandante_responsavel, $localizacao_planeta, $localizacao_orla, $ship_potential){
        $this->numero_serial_da_nave = $numero_serial_da_nave;
        $this->tipo_da_nave = $tipo_da_nave;
        $this->comandante_responsavel = $comandante_responsavel;
        $this->localizacao_planeta = $localizacao_planeta;
        $this->localizacao_orla = $localizacao_orla;
        $this->ship_potential = floatval($ship_potential);
    }
}