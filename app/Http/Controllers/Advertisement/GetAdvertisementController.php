<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/api/advertisement/{id}",
 *     summary="Obtém uma propaganda específica",
 *     description="Retorna os detalhes de uma propaganda específica pelo ID",
 *     operationId="getAdvertisement",
 *     tags={"Advertisements"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID da propaganda",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detalhes da propaganda",
 *         @OA\JsonContent(ref="#/components/schemas/Advertisement")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Propaganda não encontrada"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado"
 *     )
 * )
 */
class GetAdvertisementController extends Controller
{
    public function __invoke(int $id): JsonResponse
    {
        $advertisement = Advertisement::findOrFail($id);
        return response()->json($advertisement);
    }
}
