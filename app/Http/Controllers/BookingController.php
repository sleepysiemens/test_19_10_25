<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\BookingService;
use Illuminate\Http\JsonResponse;
use Throwable;

class BookingController extends Controller
{
    const ON_PAGE_COUNT = 10;

    public function __construct(public BookingService $bookingService) {}

    public function getAll(): JsonResponse
    {
        $bookings = $this->bookingService->getAllQuery()->paginate(self::ON_PAGE_COUNT);

        return response()->json($bookings->count() ? $bookings : 'Nothing Found', 200, [], JSON_PRETTY_PRINT);
    }

    public function create(): JsonResponse
    {
        try {
            $this->bookingService->createBooking(request()->request->all());
        } catch (Throwable $e) {
            return response()->json($e->getMessage(), 400, [], JSON_PRETTY_PRINT);
        }

        return response()->json('success', 204, [], JSON_PRETTY_PRINT);
    }
}
