<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Services\Product\StoreProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

class StoreProductController extends Controller
{

    public function __construct(private StoreProductService $storeProductService ){}

    public function __invoke(StoreProductRequest $request)
    {
        return $this->storeProductService->store($request->toArray());
    }

}
