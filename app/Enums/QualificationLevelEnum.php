<?php

namespace App\Enums;

enum QualificationLevelEnum: int
{
    case GRADE_11 = 1;
    case GRADE_12 = 2;
    case BACHELOR = 3;
    case MASTER = 4;

    public static function values(): array
    {
        return array_map(fn ($enum) => $enum->value, self::cases());
    }

    public function label(): string
    {
        return match ($this) {
            self::GRADE_11 => 'I’m Grade 11 high school student.',
            self::GRADE_12 => 'I’m Grade 12 high school student.',
            self::BACHELOR => 'I’m Bachelor student.',
            self::MASTER => 'I’m Master student.',
        };
    }
}
