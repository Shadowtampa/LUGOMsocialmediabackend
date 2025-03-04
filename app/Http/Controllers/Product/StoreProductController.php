<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Services\Product\StoreProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class StoreProductController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/product",
     *     summary="Cria um novo produto",
     *     tags={"Produtos"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/StoreProductRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Produto criado com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Product")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Erro de validação"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Não autorizado"
     *     )
     * )
     */
    public function __construct(private StoreProductService $storeProductService ){}

    public function __invoke(StoreProductRequest $request): JsonResponse
    {
        $product = $this->storeProductService->store($request->toArray());

        return response()->json([
            'message' => 'Produto criado com sucesso!',
            'product' => $product,
            'image' => $product->image ? url("storage/{$product->image}") : null,        ], 201);
    }

}
