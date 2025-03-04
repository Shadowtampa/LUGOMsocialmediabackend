<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\Promotion;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Put(
 *     path="/api/promotion/{id}",
 *     summary="Atualiza uma promoção existente",
 *     description="Atualiza os dados de uma promoção específica",
 *     operationId="updatePromotion",
 *     tags={"Promotions"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID da promoção",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/UpdatePromotionRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Promoção atualizada com sucesso",
 *         @OA\JsonContent(ref="#/components/schemas/Promotion")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Promoção não encontrada"
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
class UpdatePromotionController extends Controller
{
    public function __invoke(UpdatePromotionRequest $request, int $id): JsonResponse
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->update($request->validated());
        return response()->json($promotion);
    }
}
