<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetPromotionRequest;
use App\Http\Services\Promotion\GetPromotionService;
use Illuminate\Database\Eloquent\Collection;

class GetPromotionController extends Controller
{

    public function __construct(private GetPromotionService $promotionService) {}

    public function __invoke(GetPromotionRequest $request): Collection
    {
        return ($this->promotionService)($request->toArray());
    }
}
