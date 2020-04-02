<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Gender extends Enum
{
    const None =   0;
    const Male =   1;
    const Female = 2;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::None:
                return '未設定';
                break;
            case self::Public:
                return '男性';
                break;
            case self::Private:
                return '女性';
                break;
            default:
                return self::getKey($value);
        }
    }

    public static function getValue(string $key)
    {
        switch ($key) {
            case '未設定':
                return 0;
                break;
            case '男性':
                return 1;
                break;
            case '女性':
                return 2;
                break;
            default:
                return self::getValue($key);
        }
    }
}
