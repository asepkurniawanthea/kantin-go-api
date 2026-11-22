<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stall extends Model
{
    protected $fillable = [
        'name',
        'description',
        'phone',
        'address',
        'latitude',
        'longitude',
        'opening_hours',
    ];

    protected function casts(): array
    {
        return [
            'opening_hours' => 'array',
            'reviewed_at' => 'datetime',
        ];
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_user_id');
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}