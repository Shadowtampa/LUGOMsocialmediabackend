<?php

namespace App\Http\Services\Promotion;

use App\Http\Services\Service;
use App\Models\Promotion;
use Illuminate\Http\Request;

class UpdatePromotionService extends Service
{
    public function __invoke($request): Promotion
    {


        $promotion = Promotion::whereId($request["promotion_id"])->where('user_id', $request["user_id"])->first();


        isset($request['name']) && $promotion->name = $request['name'];
        isset($request['description']) && $promotion->description = $request['description'];
        isset($request['start_date']) && $promotion->start_date = $request['start_date'];
        isset($request['end_date']) && $promotion->end_date = $request['end_date'];
        isset($request['config']) && $promotion->config = $request['config'];
        isset($request['promotion_type_id']) && $promotion->promotion_type_id = $request['promotion_type_id'];

        $promotion->save();

        return $promotion;
    }
}
