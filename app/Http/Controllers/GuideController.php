<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\GuideService;
use Illuminate\Http\JsonResponse;

class GuideController extends Controller
{
    const ON_PAGE_COUNT = 10;

    public function __construct(public GuideService $guideServices) {}

    public function getActive(): JsonResponse
    {
        $guides = $this->guideServices->getActiveGuidesQuery(request()->query())->paginate(self::ON_PAGE_COUNT);

        return response()->json($guides->count() ? $guides : 'Nothing found', 200, [], JSON_PRETTY_PRINT);
    }
}
