<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePromotionRequest;
use App\Http\Services\Promotion\UpdatePromotionService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

class UpdatePromotionController extends Controller
{

    public function __construct(private UpdatePromotionService $promotionService) {}

    public function __invoke(UpdatePromotionRequest $request)
    {
        return ($this->promotionService)($request->toArray());
    }
}
