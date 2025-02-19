<?php

namespace App\Http\Controllers\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Services\Promotion\IndexPromotionService;
use Illuminate\Database\Eloquent\Collection;

class IndexPromotionController extends Controller
{

    public function __construct(private IndexPromotionService $indexPromotionService) {}

    public function __invoke(): Collection
    {
        return ($this->indexPromotionService)();
    }
}
