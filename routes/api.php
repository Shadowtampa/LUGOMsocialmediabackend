<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Product\{GetProductController, IndexProductController, StoreProductController , UpdateProductController, DestroyProductController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/', function () {
    return "HELLO WORLD";
});

Route::get('/me', function() {
    return auth()->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::prefix('product')->middleware('auth:sanctum')->group(function () {
    Route::post('/', StoreProductController::class); //  Criar novo produto
    Route::get('/', IndexProductController::class); // Listar todos os produtos
    Route::get('{id}', GetProductController::class); // Exibir um produto específico
    Route::put('{id}', UpdateProductController::class); // Atualizar produto
    Route::delete('{id}', DestroyProductController::class); // Deletar produto
});
