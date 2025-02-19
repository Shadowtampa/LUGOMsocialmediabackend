<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Requests\DestroyPromotionRequest;
use App\Http\Services\Promotion\DestroyPromotionService;

class DestroyPromotionController extends Controller
{

    public function __construct(private DestroyPromotionService $promotionService) {}

    public function __invoke(DestroyPromotionRequest $request): array
    {
        return ($this->promotionService)($request);
    }
}
