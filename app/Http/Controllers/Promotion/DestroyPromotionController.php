<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyPromotionRequest;
use App\Http\Services\Promotion\DestroyPromotionService;
use App\Models\Promotion;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Delete(
 *     path="/api/promotion/{id}",
 *     summary="Remove uma promoção",
 *     description="Remove uma promoção específica do sistema",
 *     operationId="destroyPromotion",
 *     tags={"Promotions"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID da promoção",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Promoção removida com sucesso"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Promoção não encontrada"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado"
 *     )
 * )
 */
class DestroyPromotionController extends Controller
{

    public function __construct(private DestroyPromotionService $promotionService) {}

    public function __invoke(int $id): JsonResponse
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        return response()->json(null, 204);
    }
}
