<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advertisement\UpdateAdvertisementRequest;
use App\Models\Advertisement;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Put(
 *     path="/api/advertisement/{id}",
 *     summary="Atualiza uma propaganda existente",
 *     description="Atualiza os dados de uma propaganda específica",
 *     operationId="updateAdvertisement",
 *     tags={"Advertisements"},
 *     security={{"bearerAuth": {}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID da propaganda",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/UpdateAdvertisementRequest")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Propaganda atualizada com sucesso",
 *         @OA\JsonContent(ref="#/components/schemas/Advertisement")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Propaganda não encontrada"
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
class UpdateAdvertisementController extends Controller
{
    public function __invoke(UpdateAdvertisementRequest $request, int $id): JsonResponse
    {
        $advertisement = Advertisement::findOrFail($id);
        $advertisement->update($request->validated());
        return response()->json($advertisement);
    }
}
