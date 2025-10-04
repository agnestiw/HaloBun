<?php

namespace App\Models;

use App\Enums\FacilityType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'address',
        'city',
        'phone',
        'hours',
        'map_embed_url',
        'lat',
        'lng',
        'status',
    ];

    protected $casts = [
        'type' => FacilityType::class,
    ];
}
