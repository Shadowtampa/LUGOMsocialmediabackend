<?php

namespace App\Http\Services\Promotion;

use App\Http\Services\Service;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DestroyPromotionService extends Service
{
    public function __invoke($request): array
    {
        try {
            Promotion::where("user_id", $request["user_id"])->whereId($request["promotion_id"])->delete();

            return ["message" => "Promotion deleted"];
        } catch (\Throwable $th) {
            return ["message" => $th];
        }
    }
}
