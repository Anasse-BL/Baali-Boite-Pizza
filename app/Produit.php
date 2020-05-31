<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    public function getPrice(){
       
        $price = $this->prix - $this->prix*$this->remise/100;
        return number_format($price,2,',','');

    }
}
