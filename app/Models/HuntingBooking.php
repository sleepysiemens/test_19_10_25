<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HuntingBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_name',
        'hunter_name',
        'guide_id',
        'date',
        'participants_count',
    ];

    public function guide(): hasOne
    {
        return $this->hasOne(Guide::class, 'id', 'guide_id');
    }
}
