<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'experience_years',
        'is_active',
    ];

    public function booking(): HasMany
    {
        return $this->hasMany(HuntingBooking::class, 'guide_id', 'id');
    }
}
