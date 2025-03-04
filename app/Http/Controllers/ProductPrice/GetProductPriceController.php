<?php

namespace App\Http\Controllers\ProductPrice;

use App\Http\Controllers\Controller;
use App\Models\ProductPrice;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/api/product-price/{id}",
 *     summary="Obtém um preço de produto específico",
 *     description="Retorna os detalhes de um preço de produto específico pelo ID",
 *     operationId="getProductPrice",
 *     tags={"Product Prices"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID do preço do produto",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detalhes do preço do produto",
 *         @OA\JsonContent(ref="#/components/schemas/ProductPrice")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Preço do produto não encontrado"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado"
 *     )
 * )
 */
class GetProductPriceController extends Controller
{
    public function __invoke(int $id): JsonResponse
    {
        $productPrice = ProductPrice::findOrFail($id);
        return response()->json($productPrice);
    }
}
