<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MyArea extends Enum
{
    const None =   0;
    const HOKKAIDO =   1; 
    const AOMORI =   2;
    const IWATE =   3; 
    const MIYAGI =   4;
    const AKITA =   5;
    const YAMAGATA =   6;
    const FUKUSHIMA =   7; 
    const IBARAKI =   8; 
    const TOCHIGI =   9;
    const GUNMA =   10;
    const SAITAMA =   11; 
    const CHIBA =   12;
    const TOKYO =   13;
    const KANAGAWA =   14; 
    const NIIGATA =   15; 
    const TOYAMA =   16; 
    const ISHIKAWA =   17; 
    const FUKUI =   18; 
    const YAMANASHI =   19;
    const NAGANO =   20; 
    const GIFU =   21; 
    const SHIZUOKA =   22;
    const AICHI =   23;
    const MIE =   24; 
    const SHIGA =   25;
    const KYOTO =   26;
    const OSAKA =   27; 
    const HYOGO =   28; 
    const NARA =   29; 
    const WAKAYAMA =   30; 
    const TOTTORI =   31; 
    const SHIMANE =   32; 
    const OKAYAMA =   33;
    const HIROSHIMA =   34;
    const YAMAGUCHI =   35; 
    const TOKUSHIMA =   36; 
    const KAGAWA =   37; 
    const EHIME =   38; 
    const KOCHI =   39;
    const FUKUOKA =   40;
    const SAGA =   41;
    const NAGASAKI =   42; 
    const KUMAMOTO =   43; 
    const OITA =   44; 
    const MIYAZAKI =   45; 
    const KAGOSHIMA =   46; 
    const OKINAWA =   47; 

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::None:
                return '未設定';
                break;
            case self::HOKKAIDO:
                return '北海道';
                break;
            case self::AOMORI:
                return '青森県';
                break;
            case self::IWATE:
                return '岩手県';
                break;
            case self::MIYAGI:
                return '宮城県';
                break;
            case self::AKITA:
                return '秋田県';
                break;
            case self::YAMAGATA:
                return '山形県';
                break;
            case self::FUKUSHIMA:
                return '福島県';
                break;
            case self::IBARAKI:
                return '茨城県';
                break;
            case self::TOCHIGI:
                return '栃木県';
                break;
            case self::GUNMA:
                return '群馬県';
                break;
            case self::SAITAMA:
                return '埼玉県';
                break;
            case self::CHIBA:
                return '千葉県';
                break;
            case self::TOKYO:
                return '東京都';
                break;
            case self::KANAGAWA:
                return '神奈川県';
                break;
            case self::NIIGATA:
                return '新潟県';
                break;
            case self::TOYAMA:
                return '富山県';
                break;
            case self::ISHIKAWA:
                return '石川県';
                break;
            case self::FUKUI:
                return '福井県';
                break;
            case self::YAMANASHI:
                return '山梨県';
                break;
            case self::NAGANO:
                return '長野県';
                break;
            case self::GIFU:
                return '岐阜県';
                break;
            case self::SHIZUOKA:
                return '静岡県';
                break;
            case self::AICHI:
                return '愛知県';
                break;
            case self::MIE:
                return '三重県';
                break;
            case self::SHIGA:
                return '滋賀県';
                break;
            case self::KYOTO:
                return '京都府';
                break;
            case self::OSAKA:
                return '大阪府';
                break;
            case self::HYOGO:
                return '兵庫県';
                break;
            case self::NARA:
                return '奈良県';
                break;
            case self::WAKAYAMA:
                return '和歌山県';
                break;
            case self::TOTTORI:
                return '鳥取県';
                break;
            case self::SHIMANE:
                return '島根県';
                break;
            case self::OKAYAMA:
                return '岡山県';
                break;
            case self::HIROSHIMA:
                return '広島県';
                break;
            case self::YAMAGUCHI:
                return '山口県';
                break;
            case self::TOKUSHIMA:
                return '徳島県';
                break;
            case self::KAGAWA:
                return '香川県';
                break;
            case self::EHIME:
                return '愛媛県';
                break;
            case self::KOCHI:
                return '高知県';
                break;
            case self::FUKUOKA:
                return '福岡県';
                break;
            case self::SAGA:
                return '佐賀県';
                break;
            case self::NAGASAKI:
                return '長崎県';
                break;
            case self::KUMAMOTO:
                return '熊本県';
                break;
            case self::OITA:
                return '大分県';
                break;
            case self::MIYAZAKI:
                return '宮崎県';
                break;
            case self::KAGOSHIMA:
                return '鹿児島県';
                break;
            case self::OKINAWA:
                return '沖縄県';
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
            case '北海道':
                return 1;
                break;
            case '青森県':
                return 2;
                break;
            case '岩手県':
                return 3;
                break;
            case '宮城県':
                return ;4
                break;
            case '秋田県':
                return 5;
                break;
            case '山形県':
                return 6;
                break;
            case '福島県':
                return 7;
                break;
            case '茨城県':
                return 8;
                break;
            case '栃木県':
                return 9;
                break;
            case '群馬県':
                return 10;
                break;
            case '埼玉県':
                return 11;
                break;
            case '千葉県':
                return 12;
                break;
            case '東京都':
                return 13;
                break;
            case '神奈川県':
                return 14;
                break;
            case '新潟県':
                return ;15
                break;
            case '富山県':
                return 16;
                break;
            case '石川県':
                return 17;
                break;
            case '福井県':
                return 18;
                break;
            case '山梨県':
                return 19;
                break;
            case '長野県':
                return 20;
                break;
            case '岐阜県':
                return 21;
                break;
            case '静岡県':
                return 22;
                break;
            case '愛知県':
                return 23;
                break;
            case '三重県':
                return 24;
                break;
            case '滋賀県':
                return 25;
                break;
            case '京都府':
                return 26;
                break;
            case '大阪府':
                return 27;
                break;
            case '兵庫県':
                return 28;
                break;
            case '奈良県':
                return 29;
                break;
            case '和歌山県':
                return 30;
                break;
            case '鳥取':
                return 31;
                break;
            case '島根県':
                return 32;
                break;
            case '岡山県':
                return 33;
                break;
            case '広島県':
                return 34;
                break;
            case '山口県':
                return 35;
                break;
            case '徳島県':
                return 36;
                break;
            case '香川県':
                return 37;
                break;
            case '愛媛県':
                return 38;
                break;
            case '高知県':
                return 39;
                break;
            case '福岡県':
                return 40;
                break;
            case '佐賀県':
                return 41;
                break;
            case '長崎県':
                return 42;
                break;
            case '熊本県':
                return 43;
                break;
            case '大分県':
                return 44;
                break;
            case '宮崎県':
                return 45;
                break;
            case '鹿児島県':
                return 46;
                break;
            case '沖縄県':
                return 47;
                break;
            default:
                return self::getValue($key);
        }
    }
}
