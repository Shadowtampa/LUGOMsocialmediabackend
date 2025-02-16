<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Services\Product\UpdateProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

class UpdateProductController extends Controller
{

    public function __construct(private UpdateProductService $ProductService ){}

    public function __invoke(UpdateProductRequest $request)
    {
        return $this->ProductService->update($request->toArray());
    }

}
