<?php

namespace App\Http\Services\ProductPrice;

use App\Http\Services\Service;
use App\Models\ProductPrice;
use Illuminate\Http\Request;

class UpdateProductPriceService extends Service
{
    public function update($request) : ProductPrice
    { 


        $productPrice = ProductPrice::whereId($request["productprice_id"])->first();

        isset($request['price']) && $productPrice->price = $request['price'];
        isset($request['start_date']) && $productPrice->start_date = $request['start_date'];
        isset($request['end_date']) && $productPrice->end_date = $request['end_date'];

        $productPrice->save();

        return $productPrice;
    }
}
