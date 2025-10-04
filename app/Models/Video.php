<?php

namespace App\Models;

use App\Enums\VideoPlatform;
use App\Enums\VideoTopic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        // 'description',
        'topic',
        'platform',
        'trimester',
        'video_id',
        'url',
        'thumbnail',
        'duration',
        'author',
        'status',
        // 'published_at',
    ];

    protected $casts = [
        'topic' => VideoTopic::class,
        'platform' => VideoPlatform::class,
        // 'published_at' => 'datetime',
    ];

    /**
     * Boot the model.
     * Otomatis membuat slug saat menyimpan/memperbarui judul.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($video) {
            if (empty($video->slug)) {
                $video->slug = Str::slug($video->title);
            }
        });

        static::updating(function ($video) {
            if ($video->isDirty('title')) {
                 $video->slug = Str::slug($video->title);
            }
        });
    }
}