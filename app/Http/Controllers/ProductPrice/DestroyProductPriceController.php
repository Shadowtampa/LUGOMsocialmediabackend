<?php

namespace App\Http\Controllers\ProductPrice;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyProductRequest;
use App\Http\Services\ProductPrice\DestroyProductPriceService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

class DestroyProductPriceController extends Controller
{

    public function __construct(private DestroyProductPriceService $productService ){}

    public function __invoke(DestroyProductRequest $request) : array
    {
        return $this->productService->delete($request);
    }

}
