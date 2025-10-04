<?php

namespace App\Enums;

enum FaqCategory: string
{
    case NUTRISI = 'Nutrisi';
    case PERSALINAN = 'Persalinan';
    case KONDISI_DARURAT = 'Kondisi Darurat';
    // Tambahkan kategori lain jika perlu

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
