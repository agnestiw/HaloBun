<?php

namespace App\Models;

use App\Enums\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        // 'excerpt',
        'content',
        'category',
        'trimester',
        'thumbnail',
        'status',
        'author1',
        'author2',
        'author3',
    ];

    protected $casts = [
        'category' => ArticleCategory::class,
    ];

    /**
     * Boot the model.
     * Otomatis membuat slug saat menyimpan judul baru.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('title')) {
                $article->slug = Str::slug($article->title);
            }
        });
    }
}
