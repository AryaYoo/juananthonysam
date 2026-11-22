<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrayerRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'request_text',
        'is_anonymous',
        'is_contacted',
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
        'is_contacted' => 'boolean',
    ];
}
