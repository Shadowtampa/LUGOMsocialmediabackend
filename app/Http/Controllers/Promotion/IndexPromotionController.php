<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Services\Promotion\IndexPromotionService;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Promotion;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/api/promotion",
 *     summary="Lista todas as promoções",
 *     description="Retorna uma lista de todas as promoções cadastradas",
 *     operationId="indexPromotion",
 *     tags={"Promotions"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Lista de promoções",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Promotion")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado"
 *     )
 * )
 */
class IndexPromotionController extends Controller
{

    public function __construct(private IndexPromotionService $indexPromotionService) {}

    public function __invoke(): JsonResponse
    {
        $promotions = Promotion::all();
        return response()->json($promotions);
    }
}
