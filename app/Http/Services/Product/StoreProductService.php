<?php

namespace App\Http\Services\Product;

use App\Http\Services\Service;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreProductService extends Service
{
    public function store($request): Product
    {

        // Se tiver imagem, faz o upload e salva o caminho
        if (isset($request['image'])) {
            $path = $request['image']->store('products', 'public');
            $request['image'] = $path;
        }


        return Product::create($request);
    }
}
