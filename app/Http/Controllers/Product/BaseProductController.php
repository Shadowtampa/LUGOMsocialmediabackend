<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

/**
 * @OA\Tag(
 *     name="Produtos",
 *     description="Endpoints para gerenciamento de produtos"
 * )
 *
 * @OA\Schema(
 *     schema="Product",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Smartphone XYZ"),
 *     @OA\Property(property="description", type="string", nullable=true, example="Smartphone de última geração"),
 *     @OA\Property(property="condition", type="string", enum={"new", "used"}, example="new"),
 *     @OA\Property(property="available", type="boolean", example=true),
 *     @OA\Property(property="image", type="string", nullable=true),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class BaseProductController extends Controller
{
}
