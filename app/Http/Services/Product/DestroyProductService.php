<?php

namespace App\Http\Services\Product;

use App\Http\Services\Service;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DestroyProductService extends Service
{
    public function delete($request) : array
    { 
        try {
            Product::where("user_id", $request["user_id"])->where("id", $request["product_id"])->delete();

            return ["message" => "Product deleted"];
        } catch (\Throwable $th) {
            return ["message" =>$th ];
        } 


    }
}
