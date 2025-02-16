<?php

namespace App\Http\Services\Product;

use App\Http\Services\Service;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreProductService extends Service
{
    public function store($request) : Product{ 

        return Product::create($request);
    }
}
