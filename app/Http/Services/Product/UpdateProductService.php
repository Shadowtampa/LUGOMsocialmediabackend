<?php

namespace App\Http\Services\Product;

use App\Http\Services\Service;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateProductService extends Service
{
    public function update($request): Product
    {


        $product = Product::whereId($request["product_id"])->where('user_id', $request["user_id"])->first();


        isset($request['name']) && $product->name = $request['name'];
        isset($request['description']) && $product->description = $request['description'];
        isset($request['condition']) && $product->condition = $request['condition'];
        isset($request['available']) && $product->available = $request['available'];

        $product->save();

        return $product;
    }
}
