<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Services\Promotion\StorePromotionService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Request;

class StorePromotionController extends Controller
{

    public function __construct(private StorePromotionService $storePromotionService) {}

    public function __invoke(StorePromotionRequest $request)
    {

        return ($this->storePromotionService)($request->toArray());
    }
}
