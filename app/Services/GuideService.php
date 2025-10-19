<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Guide;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class GuideService
{
    public function getActiveGuidesQuery(array $filters = []): Builder
    {
        return Guide::query()
            ->where('is_active', true)
            ->when(
                Arr::has($filters, 'min_experience'),
                fn (Builder $q) => $q->where('experience_years', '>=', $filters['min_experience'])
            )
            ->orderBy('id');
    }
}
