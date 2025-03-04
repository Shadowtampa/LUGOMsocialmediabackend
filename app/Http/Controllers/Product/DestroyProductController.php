<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyProductRequest;
use App\Http\Services\Product\DestroyProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class DestroyProductController extends Controller
{
    /**
     * @OA\Delete(
     *     path="/api/product/{id}",
     *     summary="Remove um produto",
     *     tags={"Produtos"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do produto",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Produto removido com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Produto não encontrado"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Não autorizado"
     *     )
     * )
     */
    public function __construct(private DestroyProductService $productService ){}

    public function __invoke(DestroyProductRequest $request, int $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(null, 204);
    }

}
