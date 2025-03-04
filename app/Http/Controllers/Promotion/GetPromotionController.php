<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetPromotionRequest;
use App\Http\Services\Promotion\GetPromotionService;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Promotion;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/api/promotion/{id}",
 *     summary="Obtém uma promoção específica",
 *     description="Retorna os detalhes de uma promoção específica pelo ID",
 *     operationId="getPromotion",
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
 *         response=200,
 *         description="Detalhes da promoção",
 *         @OA\JsonContent(ref="#/components/schemas/Promotion")
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
class GetPromotionController extends Controller
{

    public function __construct(private GetPromotionService $promotionService) {}

    public function __invoke(GetPromotionRequest $request): Collection
    {
        return ($this->promotionService)($request->toArray());
    }

    public function getPromotion(int $id): JsonResponse
    {
        $promotion = Promotion::findOrFail($id);
        return response()->json($promotion);
    }
}
