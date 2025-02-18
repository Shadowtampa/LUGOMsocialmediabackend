<?php

namespace App\Http\Services\ProductPrice;

use App\Http\Services\Service;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Http\Request;

class StoreProductPriceService extends Service
{
    public function store($request): ProductPrice
    {
        return ProductPrice::create($request);
    }
}
