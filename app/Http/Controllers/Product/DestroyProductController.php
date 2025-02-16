<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyProductRequest;
use App\Http\Services\Product\DestroyProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

class DestroyProductController extends Controller
{

    public function __construct(private DestroyProductService $productService ){}

    public function __invoke(DestroyProductRequest $request) : array
    {
        return $this->productService->delete($request);
    }

}
