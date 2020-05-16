<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PrivateStatus extends Enum
{
    
    const Public =   0;
    const Private =   1;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::Public:
                return '公開';
                break;
            case self::Private:
                return '非公開';
                break;
            default:
                return self::getKey($value);
        }
    }

    public static function getValue(string $key)
    {
        switch ($key) {
            case '公開':
                return 0;
                break;
            case '非公開':
                return 1;
                break;
            default:
                return self::getValue($key);
        }
    }
}
