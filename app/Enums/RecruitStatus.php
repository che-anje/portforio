<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RecruitStatus extends Enum
{
    const Wanted =   0;
    const Stop =   1;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::Wanted:
                return '募集中';
                break;
            case self::Stop:
                return '募集中止';
                break;
            default:
                return self::getKey($value);
        }
    }

    public static function getValue(string $key)
    {
        switch ($key) {
            case '募集中':
                return 0;
                break;
            case '募集中止':
                return 1;
                break;
            default:
                return self::getValue($key);
        }
    }
}
