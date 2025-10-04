<?php

namespace App\Enums;

enum VideoTopic: string
{
    case OLAHRAGA_PRENATAL = 'Olahraga Prenatal';
    case NUTRISI = 'Nutrisi';
    case PERSIAPAN_PERSALINAN = 'Persiapan Persalinan';
    case KESEHATAN_MENTAL = 'Kesehatan Mental';
    // Tambahkan topik lain sesuai kebutuhan

    /**
     * Mengembalikan semua nilai dari enum.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}