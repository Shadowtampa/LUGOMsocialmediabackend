<?php

namespace App\Http\Controllers\ProductPrice;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductPriceRequest;
use App\Http\Services\ProductPrice\StoreProductPriceService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

class StoreProductPriceController extends Controller
{

    public function __construct(private StoreProductPriceService $storeProductService ){}

    public function __invoke(StoreProductPriceRequest $request)
    {
        return $this->storeProductService->store($request->toArray());
    }

}
