<?php

namespace App\Http\Services\Product;

use App\Http\Services\Service;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GetProductService extends Service
{
    public function get($request) : Collection
    { 
        return Product::where("user_id", $request["user_id"])->where("id", $request["product_id"])->get();
    }
}
