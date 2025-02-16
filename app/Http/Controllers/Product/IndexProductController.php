<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\IndexProductService;
use Illuminate\Database\Eloquent\Collection;

class IndexProductController extends Controller
{

    public function __construct(private IndexProductService $productService ){}

    public function __invoke() : Collection
    {
        return $this->productService->index();
    }

}
