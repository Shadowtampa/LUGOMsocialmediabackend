<?php

namespace App\Models\Promotion;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{


    public function isActive()
    {
        return now()->between($this->start_date, $this->end_date);
    }

    // M�todo gen�rico para aplicar a promo��o
    public function apply($order)
    {
        return $order; // A implementa��o espec�fica ser� feita nas subclasses
    }
}
