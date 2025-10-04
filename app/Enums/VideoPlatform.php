<?php

namespace App\Enums;

enum VideoPlatform: string
{
    case YOUTUBE = 'YouTube';
    case TIKTOK = 'TikTok';
    // Tambahkan platform lain sesuai kebutuhan

    /**
     * Mengembalikan semua nilai dari enum.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
