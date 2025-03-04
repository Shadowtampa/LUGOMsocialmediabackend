<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetProductRequest;
use App\Http\Services\Product\GetProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class GetProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/product/{id}",
     *     summary="Obtém um produto específico",
     *     tags={"Produtos"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do produto",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Produto encontrado",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Produto não encontrado"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Não autorizado"
     *     )
     * )
     */
    public function __construct(private GetProductService $productService ){}

    public function __invoke(GetProductRequest $request, int $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

}
