<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Services\Promotion\StorePromotionService;



use App\Models\Promotion;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Post(
 *     path="/api/promotion",
 *     summary="Cria uma nova promoção",
 *     description="Cria uma nova promoção com os dados fornecidos",
 *     operationId="storePromotion",
 *     tags={"Promotions"},
 *     security={{"bearerAuth": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/StorePromotionRequest")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Promoção criada com sucesso",
 *         @OA\JsonContent(ref="#/components/schemas/Promotion")
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
class StorePromotionController extends Controller
{

    public function __construct(private StorePromotionService $storePromotionService) {}

    public function __invoke(StorePromotionRequest $request)
    {

        return ($this->storePromotionService)($request->toArray());
    }
}
