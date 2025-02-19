<?php

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Product\{GetProductController, IndexProductController, StoreProductController, UpdateProductController, DestroyProductController};

use App\Http\Controllers\ProductPrice\{IndexProductPriceController, GetProductPriceController, DestroyProductPriceController, StoreProductPriceController, UpdateProductPriceController};

use App\Http\Controllers\Promotion\{IndexPromotionController, StorePromotionController, GetPromotionController, UpdatePromotionController, DestroyPromotionController};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/', function () {
    return "HELLO WORLD";
});

Route::get('/me', function () {
    return auth()->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::prefix('product')->middleware('auth:sanctum')->group(function () {
    Route::get('/', IndexProductController::class); // Listar todos os produtos
    Route::post('/', StoreProductController::class); //  Criar novo produto
    Route::get('{id}', GetProductController::class); // Exibir um produto específico
    Route::put('{id}', UpdateProductController::class); // Atualizar produto
    Route::delete('{id}', DestroyProductController::class); // Deletar produto
});

Route::prefix('productprice')->middleware('auth:sanctum')->group(function () {
    Route::post('/', StoreProductPriceController::class); //  Criar novo produto
    Route::get('/', IndexProductPriceController::class); // Listar todos os preços de produtos
    Route::get('{id}', GetProductPriceController::class); // Exibir um produto específico
    Route::put('{id}', UpdateProductPriceController::class); // Atualizar produto
    Route::delete('{id}', DestroyProductPriceController::class); // Deletar produto
});

Route::prefix('promotion')->middleware('auth:sanctum')->group(function () {
    Route::get('/', IndexPromotionController::class); // Listar todos os produtos
    Route::post('/', StorePromotionController::class); //  Criar novo produto
    Route::get('{id}', GetPromotionController::class); // Exibir um produto específico
    Route::put('{id}', UpdatePromotionController::class); // Atualizar produto
    Route::delete('{id}', DestroyPromotionController::class); // Deletar produto
});
