<?php

namespace App\Enums;

enum UeType: string
{
    case Fondamentale = 'fondamentale';
    case Optionnelle = 'optionnelle';
    case Transversale = 'transversale';

    public function label(): string
    {
        return match ($this) {
            self::Fondamentale => 'Fondamentale',
            self::Optionnelle => 'Optionnelle',
            self::Transversale => 'Transversale',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function forSelect(): array
    {
        $pairs = [];
        foreach (self::cases() as $case) {
            $pairs[$case->value] = $case->label();
        }
        return $pairs;
    }
}
