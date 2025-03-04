<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/api/advertisement",
 *     summary="Lista todas as propagandas",
 *     description="Retorna uma lista de todas as propagandas cadastradas",
 *     operationId="indexAdvertisement",
 *     tags={"Advertisements"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Lista de propagandas",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Advertisement")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado"
 *     )
 * )
 */
class IndexAdvertisementController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $advertisements = Advertisement::all();
        return response()->json($advertisements);
    }
}
