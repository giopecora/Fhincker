<?php

namespace App\Models\DAO;



class SoldadoDAO extends BaseDAO{

    private $client;
    private $collection;
    
    public function __construct(){
        $this->client = new \MongoDB\Client("mongodb://127.0.0.1:27017");
        $this->collection = $this->client->imperio->soldados;
    }
    
    public function countNavesImperio($seriais){
        $count = 0;
        foreach ($seriais as $serial) {
            $count += $this->collection->count( ['numero_serial_da_nave' => $serial]);
        }

       return $count;
    }
  
   
}