<?php

namespace App\Http\Services\Promotion;

use App\Http\Services\Service;
use App\Models\Promotion;
use Illuminate\Http\Request;

class IndexPromotionService extends Service
{
    public function __invoke()
    {
        return Promotion::where("user_id", auth()->user()->id)->get();
    }
}
