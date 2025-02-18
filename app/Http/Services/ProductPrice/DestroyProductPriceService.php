<?php

namespace App\Http\Services\ProductPrice;

use App\Http\Services\Service;
use App\Models\ProductPrice;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DestroyProductPriceService extends Service
{
    public function delete($request) : array
    { 
        try {
            ProductPrice::whereId($request["product_id"])->delete();

            return ["message" => "Product Price deleted"];
        } catch (\Throwable $th) {
            return ["message" =>$th ];
        } 


    }
}
