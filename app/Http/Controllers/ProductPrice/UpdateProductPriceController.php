<?php

namespace App\Http\Controllers\ProductPrice;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPrice\UpdateProductPriceRequest;
use App\Models\ProductPrice;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Put(
 *     path="/api/product-price/{id}",
 *     summary="Atualiza um preço de produto existente",
 *     description="Atualiza os dados de um preço de produto específico",
 *     operationId="updateProductPrice",
 *     tags={"Product Prices"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID do preço do produto",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/UpdateProductPriceRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Preço do produto atualizado com sucesso",
 *         @OA\JsonContent(ref="#/components/schemas/ProductPrice")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Preço do produto não encontrado"
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
class UpdateProductPriceController extends Controller
{
    public function __invoke(UpdateProductPriceRequest $request, int $id): JsonResponse
    {
        $productPrice = ProductPrice::findOrFail($id);
        $productPrice->update($request->validated());
        return response()->json($productPrice);
    }
}
