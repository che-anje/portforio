<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RequestRequired extends Enum
{
    const necessary =   0;
    const unnecessary =   1;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::necessary:
                return '必要（サークル参加時の承認が必要)';
                break;
            case self::unnecessary:
                return '不要（サークル参加時の承認が不要)';
                break;
            default:
                return self::getKey($value);
        }
    }

    public static function getValue(string $key)
    {
        switch ($key) {
            case '必要（サークル参加時の承認が必要)':
                return 0;
                break;
            case '必要（サークル参加時の承認が必要)':
                return 1;
                break;
            default:
                return self::getValue($key);
        }
    }
    
}
