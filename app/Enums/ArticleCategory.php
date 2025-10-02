<?php

namespace App\Enums;

enum ArticleCategory: string
{
    case PERKEMBANGAN_JANIN = 'Perkembangan Janin';
    case NUTRISI = 'Nutrisi';
    case PERSIAPAN_PERSALINAN = 'Persiapan Persalinan';

    /**
     * Mengembalikan semua nilai dari enum.
     *
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
