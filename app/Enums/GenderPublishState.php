<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class GenderPublishState extends Enum
{
    const None =   0;
    const Public =   1;
    const Private =   2;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::None:
                return '未設定';
                break;
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
            case '未設定':
                return 0;
                break;
            case '公開':
                return 1;
                break;
            case '非公開':
                return 2;
                break;
            default:
                return self::getValue($key);
        }
    }
}
