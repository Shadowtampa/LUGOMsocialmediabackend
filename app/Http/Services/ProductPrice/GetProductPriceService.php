<?php

namespace App\Http\Services\ProductPrice;

use App\Http\Services\Service;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GetProductPriceService extends Service
{
    public function get($request) : Collection
    { 
        return ProductPrice::whereId($request["productprice_id"])->get();
    }
}
