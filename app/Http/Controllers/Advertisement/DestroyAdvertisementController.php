<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Delete(
 *     path="/api/advertisement/{id}",
 *     summary="Remove uma propaganda",
 *     description="Remove uma propaganda específica do sistema",
 *     operationId="destroyAdvertisement",
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
 *         response=204,
 *         description="Propaganda removida com sucesso"
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
class DestroyAdvertisementController extends Controller
{
    public function __invoke(int $id): JsonResponse
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->delete();
        return response()->json(null, 204);
    }
}
