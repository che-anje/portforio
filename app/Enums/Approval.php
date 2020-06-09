<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Approval extends Enum
{
    const unapproved =   0;
    const pending =   1;
    const approved =   2;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::unapproved:
                return '未承認';
                break;
            case self::pending:
                return '承認待ち';
                break;
            case self::approved:
                return '承認済';
                break;
            default:
                return self::getKey($value);
        }
    }

    public static function getValue(string $key)
    {
        switch ($key) {
            case '未承認':
                return 0;
                break;
            case '承認待ち':
                return 1;
                break;
            case '承認済':
                return 2;
                break;
            default:
                return self::getValue($key);
        }
    }
}
