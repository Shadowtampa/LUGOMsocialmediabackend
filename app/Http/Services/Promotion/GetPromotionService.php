<?php

namespace App\Http\Services\Promotion;

use App\Http\Services\Service;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class GetPromotionService extends Service
{
    public function __invoke($request): Collection
    {
        return Promotion::where("user_id", $request["user_id"])->whereId($request["promotion_id"])->get();
    }
}
