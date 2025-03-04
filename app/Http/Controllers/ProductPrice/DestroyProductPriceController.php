<?php

namespace App\Http\Controllers\ProductPrice;

use App\Http\Controllers\Controller;
use App\Models\ProductPrice;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Delete(
 *     path="/api/product-price/{id}",
 *     summary="Remove um preço de produto",
 *     description="Remove um preço de produto específico do sistema",
 *     operationId="destroyProductPrice",
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
 *         response=204,
 *         description="Preço do produto removido com sucesso"
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
class DestroyProductPriceController extends Controller
{
    public function __invoke(int $id): JsonResponse
    {
        $productPrice = ProductPrice::findOrFail($id);
        $productPrice->delete();
        return response()->json(null, 204);
    }
}
