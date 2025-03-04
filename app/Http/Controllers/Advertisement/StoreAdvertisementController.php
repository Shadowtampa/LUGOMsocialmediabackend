<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advertisement\StoreAdvertisementRequest;
use App\Models\Advertisement;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Post(
 *     path="/api/advertisement",
 *     summary="Cria uma nova propaganda",
 *     description="Cria uma nova propaganda com os dados fornecidos",
 *     operationId="storeAdvertisement",
 *     tags={"Advertisements"},
 *     security={{"bearerAuth": {}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/StoreAdvertisementRequest")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Propaganda criada com sucesso",
 *         @OA\JsonContent(ref="#/components/schemas/Advertisement")
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
class StoreAdvertisementController extends Controller
{
    public function __invoke(StoreAdvertisementRequest $request): JsonResponse
    {
        $advertisement = Advertisement::create($request->validated());
        return response()->json($advertisement, 201);
    }
}
