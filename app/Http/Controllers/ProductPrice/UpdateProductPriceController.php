<?php

namespace App\Http\Controllers\ProductPrice;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductPriceRequest;
use App\Http\Services\ProductPrice\UpdateProductPriceService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

class UpdateProductPriceController extends Controller
{

    public function __construct(private UpdateProductPriceService $ProductService ){}

    public function __invoke(UpdateProductPriceRequest $request)
    {
        return $this->ProductService->update($request->toArray());
    }

}
