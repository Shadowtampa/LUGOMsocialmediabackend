<?php

namespace App\Http\Controllers\ProductPrice;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductPrice\IndexProductPriceService;
use Illuminate\Database\Eloquent\Collection;

class IndexProductPriceController extends Controller
{

    public function __construct(private IndexProductPriceService $productService ){}

    public function __invoke() : Collection
    {
        return $this->productService->index();
    }

}
