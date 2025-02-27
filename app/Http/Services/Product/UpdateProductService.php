<?php

namespace App\Http\Services\Product;

use App\Http\Services\Service;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateProductService extends Service
{
    public function update($request): Product
    {

        $product = Product::whereId($request["product_id"])->where('user_id', $request["user_id"])->first();

        // Se tiver imagem, faz o upload e salva o caminho
        if (isset($request['image'])) {

            // Remove a parte do caminho base para obter o caminho relativo
            $relativePath = str_replace('http://localhost:8989/storage/', '', $product->image);

            // Verifica se a imagem existe no storage e a exclui
            if (\Storage::disk('public')->exists($relativePath)) {
                \Storage::disk('public')->delete($relativePath);
            }

            $path = $request['image']->store('products', 'public');

            $product->image = $path;
        }

        isset($request['name']) && $product->name = $request['name'];
        isset($request['description']) && $product->description = $request['description'];
        isset($request['condition']) && $product->condition = $request['condition'];
        isset($request['available']) && $product->available = $request['available'];

        $product->save();

        return $product;
    }
}
