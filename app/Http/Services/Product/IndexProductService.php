<?php

namespace App\Http\Services\Product;

use App\Http\Services\Service;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexProductService extends Service
{
    public function __invoke()
    {
        return Product::where("user_id", auth()->user()->id)->get();
    }
}
