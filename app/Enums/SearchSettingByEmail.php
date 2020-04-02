<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SearchSettingByEmail extends Enum
{
    const None =   0;
    const Permit =   1;
    const Prohibit = 2;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::None:
                return '未設定';
                break;
            case self::Permit:
                return '許可する';
                break;
            case self::Prohibit:
                return '許可しない';
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
            case '許可する':
                return 1;
                break;
            case '許可しない':
                return 2;
                break;
            default:
                return self::getValue($key);
        }
    }
}
