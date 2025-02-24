<?php

namespace App\Models\Promotion;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{


    public function isActive()
    {
        return now()->between($this->start_date, $this->end_date);
    }

    // Método genérico para aplicar a promoção
    public function apply($order)
    {
        return $order; // A implementação específica será feita nas subclasses
    }
}
