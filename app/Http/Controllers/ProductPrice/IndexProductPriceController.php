<?php

namespace App\Http\Controllers\ProductPrice;

use App\Http\Controllers\Controller;
use App\Models\ProductPrice;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/api/product-price",
 *     summary="Lista todos os preços de produtos",
 *     description="Retorna uma lista de todos os preços de produtos cadastrados",
 *     operationId="indexProductPrice",
 *     tags={"Product Prices"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Lista de preços de produtos",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/ProductPrice")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado"
 *     )
 * )
 */
class IndexProductPriceController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $productPrices = ProductPrice::all();
        return response()->json($productPrices);
    }
}
