<?php

namespace App\Models\Promotion;

use Illuminate\Database\Eloquent\Model;

class FixedDiscountPromotion extends Promotion
{

    public function isActive()
    {
        return now()->between($this->start_date, $this->end_date);
    }

    // Método genérico para aplicar a promoção
    public function apply($order)
    {
        $order->total -= $this->discount_amount;
        return $order;
    }
}
