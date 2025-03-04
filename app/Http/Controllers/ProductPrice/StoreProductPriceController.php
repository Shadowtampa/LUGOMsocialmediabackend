<?php

namespace App\Http\Controllers\ProductPrice;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPrice\StoreProductPriceRequest;
use App\Models\ProductPrice;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Post(
 *     path="/api/product-price",
 *     summary="Cria um novo preço de produto",
 *     description="Cria um novo preço de produto com os dados fornecidos",
 *     operationId="storeProductPrice",
 *     tags={"Product Prices"},
 *     security={{"bearerAuth": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/StoreProductPriceRequest")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Preço de produto criado com sucesso",
 *         @OA\JsonContent(ref="#/components/schemas/ProductPrice")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Erro de validação",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="The given data was invalid."),
 *             @OA\Property(property="errors", type="object")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado"
 *     )
 * )
 */
class StoreProductPriceController extends Controller
{
    public function __invoke(StoreProductPriceRequest $request): JsonResponse
    {
        $productPrice = ProductPrice::create($request->validated());
        return response()->json($productPrice, 201);
    }
}
