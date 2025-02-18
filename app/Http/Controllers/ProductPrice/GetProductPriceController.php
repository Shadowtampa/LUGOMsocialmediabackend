<?php

namespace App\Http\Controllers\ProductPrice;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetProductPriceRequest;
use App\Http\Services\ProductPrice\GetProductPriceService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

class GetProductPriceController extends Controller
{

    public function __construct(private GetProductPriceService $productService ){}

    public function __invoke(GetProductPriceRequest $request) : Collection
    {
        return $this->productService->get($request->toArray());
    }

}
