<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetProductRequest;
use App\Http\Services\Product\GetProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

class GetProductController extends Controller
{

    public function __construct(private GetProductService $productService ){}

    public function __invoke(GetProductRequest $request) : Collection
    {
        return $this->productService->get($request->toArray());
    }

}
