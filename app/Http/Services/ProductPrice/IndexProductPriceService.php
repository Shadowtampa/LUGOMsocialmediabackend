<?php

namespace App\Http\Services\ProductPrice;

use App\Http\Services\Service;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class IndexProductPriceService extends Service
{
    public function index(){ 
        return auth()->user()->prices;
    }
}
