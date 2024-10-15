<?php

namespace App\Enums;

enum UserType: string
{
    case LECTURER = 'lecturer';
    case STUDENT = 'student';
    case OPERATOR = 'operator';

    public static function getValues(): array
    {
        return [
            self::LECTURER,
            self::STUDENT,
            self::OPERATOR,
        ];
    }
}
