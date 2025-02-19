<?php

namespace App\Http\Services\Promotion;

use App\Http\Services\Service;
use App\Models\Promotion;
use Illuminate\Http\Request;

class StorePromotionService extends Service
{
    public function __invoke($request): Promotion
    {
        return Promotion::create($request);
    }
}
