<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\IndexProductService;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class IndexProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/product",
     *     summary="Lista todos os produtos",
     *     tags={"Produtos"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de produtos",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Product")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Não autorizado"
     *     )
     * )
     */
    public function __construct(private IndexProductService $productService) {}

    public function __invoke(): JsonResponse
    {
        $products = Product::all();

        return response()->json($products);
    }
}
