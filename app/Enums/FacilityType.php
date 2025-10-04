<?php

namespace App\Enums;

enum FacilityType: string
{
    case PUSKESMAS = 'puskesmas';
    case RUMAH_SAKIT = 'rumah_sakit';
    case KLINIK = 'klinik';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
