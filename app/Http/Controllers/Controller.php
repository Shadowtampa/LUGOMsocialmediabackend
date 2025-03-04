<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="API Documentation",
 *     description="Documentação da API do sistema",
 *     @OA\Contact(
 *         email="contato@exemplo.com"
 *     )
 * )
 *
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 *
 * @OA\Schema(
 *     schema="Advertisement",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Promoção de Verão"),
 *     @OA\Property(property="description", type="string", example="Descontos especiais para o verão"),
 *     @OA\Property(property="image", type="string", nullable=true, example="https://exemplo.com/imagem.jpg"),
 *     @OA\Property(property="product_id", type="integer", nullable=true, example=1),
 *     @OA\Property(property="promotion_id", type="integer", nullable=true, example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-03-03T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-03-03T00:00:00Z")
 * )
 *
 * @OA\Schema(
 *     schema="StoreAdvertisementRequest",
 *     required={"title", "description"},
 *     @OA\Property(property="title", type="string", example="Promoção de Verão"),
 *     @OA\Property(property="description", type="string", example="Descontos especiais para o verão"),
 *     @OA\Property(property="image", type="string", nullable=true, example="https://exemplo.com/imagem.jpg"),
 *     @OA\Property(property="product_id", type="integer", nullable=true, example=1),
 *     @OA\Property(property="promotion_id", type="integer", nullable=true, example=1)
 * )
 *
 * @OA\Schema(
 *     schema="UpdateAdvertisementRequest",
 *     @OA\Property(property="title", type="string", example="Promoção de Verão"),
 *     @OA\Property(property="description", type="string", example="Descontos especiais para o verão"),
 *     @OA\Property(property="image", type="string", nullable=true, example="https://exemplo.com/imagem.jpg"),
 *     @OA\Property(property="product_id", type="integer", nullable=true, example=1),
 *     @OA\Property(property="promotion_id", type="integer", nullable=true, example=1)
 * )
 *
 * @OA\Schema(
 *     schema="Promotion",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Promoção de Verão"),
 *     @OA\Property(property="description", type="string", example="Descontos especiais para o verão"),
 *     @OA\Property(property="type", type="string", enum={"fixed_discount", "percentage_discount", "buy_x_get_y"}, example="fixed_discount"),
 *     @OA\Property(property="value", type="number", format="float", example=10.00),
 *     @OA\Property(property="start_date", type="string", format="date-time", example="2024-03-03T00:00:00Z"),
 *     @OA\Property(property="end_date", type="string", format="date-time", example="2024-12-31T23:59:59Z"),
 *     @OA\Property(property="is_active", type="boolean", example=true),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-03-03T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-03-03T00:00:00Z")
 * )
 *
 * @OA\Schema(
 *     schema="UpdatePromotionRequest",
 *     @OA\Property(property="name", type="string", example="Promoção de Verão"),
 *     @OA\Property(property="description", type="string", example="Descontos especiais para o verão"),
 *     @OA\Property(property="type", type="string", enum={"fixed_discount", "percentage_discount", "buy_x_get_y"}, example="fixed_discount"),
 *     @OA\Property(property="value", type="number", format="float", example=10.00),
 *     @OA\Property(property="start_date", type="string", format="date-time", example="2024-03-03T00:00:00Z"),
 *     @OA\Property(property="end_date", type="string", format="date-time", example="2024-12-31T23:59:59Z"),
 *     @OA\Property(property="is_active", type="boolean", example=true)
 * )
 *
 * @OA\Schema(
 *     schema="ProductPrice",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="product_id", type="integer", example=1),
 *     @OA\Property(property="price", type="number", format="float", example=99.99),
 *     @OA\Property(property="currency", type="string", example="BRL"),
 *     @OA\Property(property="start_date", type="string", format="date-time", example="2024-03-03T00:00:00Z"),
 *     @OA\Property(property="end_date", type="string", format="date-time", example="2024-12-31T23:59:59Z"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-03-03T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-03-03T00:00:00Z")
 * )
 *
 *
 * @OA\Schema(
 *     schema="UpdateProductPriceRequest",
 *     @OA\Property(property="price", type="number", format="float", example=99.99),
 *     @OA\Property(property="currency", type="string", example="BRL"),
 *     @OA\Property(property="start_date", type="string", format="date-time", example="2024-03-03T00:00:00Z"),
 *     @OA\Property(property="end_date", type="string", format="date-time", example="2024-12-31T23:59:59Z")
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
