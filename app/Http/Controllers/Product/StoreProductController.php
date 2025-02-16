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

        $product = $this->storeProductService->store($request->toArray());

        return response()->json([
            'message' => 'Produto criado com sucesso!',
            'product' => $product,
            'image_url' => $product->image ? asset("storage/{$product->image}") : null,
        ], 201);
    }

}
