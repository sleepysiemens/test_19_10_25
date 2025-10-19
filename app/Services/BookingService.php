<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\HuntingBooking;
use App\Rules\CheckIfGuideExist;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Throwable;

class BookingService
{
    public function getAllQuery(): Builder
    {
        return HuntingBooking::query();
    }

    /**
     * @throws Throwable
     */
    public function createBooking(array $data): void
    {
        $rules = [
            'tour_name'          => ['required', 'string'],
            'hunter_name'        => ['required', 'string'],
            'guide_id'           => ['required', 'int', new CheckIfGuideExist()],
            'date'               => ['required', 'date_format:Y.m.d'],
            'participants_count' => ['required', 'int', 'max:10']
        ];

        validator($data, $rules)->validate();

        # Проверяем наличие бронирований у гида на эту дату
        $dateOccupied = HuntingBooking::query()
            ->where('date', $data['date'])
            ->where('guide_id', $data['guide_id'])
            ->exists();

        throw_if($dateOccupied, new Exception("Date is occupied for this guide."));

        HuntingBooking::query()->create($data);
    }
}
