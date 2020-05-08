<?php
use App\Enums\Gender;
use App\Enums\GenderPublishState;
use App\Enums\BirthdayPublishState;
use App\Enums\PrefectureOfInterest;
use App\Enums\SearchSettingByEmail;
use App\Enums\MyArea;
 
return [
    GenderPublishState::class => [
        GenderPublishState::None => '未設定',
        GenderPublishState::Public => '公開',
        GenderPublishState::Private => '非公開',
    ],
];

return [
    Gender::class => [
        Gender::None => '未設定',
        Gender::Public => '男性',
        Gender::Private => '女性',
    ],
];

return [
    BirthdayPublishState::class => [
        BirthdayPublishState::None => '未設定',
        BirthdayPublishState::Public => '公開',
        BirthdayPublishState::Private => '非公開',
    ],
];

return [
    SearchSettingByEmail::class => [
        SearchSettingByEmail::None => '未設定',
        SearchSettingByEmail::Permit => '許可する',
        SearchSettingByEmail::Prohibit => '許可しない',
    ],
];

return [
    PrefectureOfInterest::class => [
        PrefectureOfInterest::None => '未設定',
        PrefectureOfInterest::HOKKAIDO => '北海道',
        PrefectureOfInterest::AOMORI => '青森県',
        PrefectureOfInterest::IWATE => '岩手県',
        PrefectureOfInterest::MIYAGI => '宮城県',
        PrefectureOfInterest::AKITA => '秋田県',
        PrefectureOfInterest::YAMAGATA => '山形県',
        PrefectureOfInterest::FUKUSHIMA => '福島県',
        PrefectureOfInterest::IBARAKI => '茨城県',
        PrefectureOfInterest::TOCHIGI => '栃木県',
        PrefectureOfInterest::GUNMA => '群馬県',
        PrefectureOfInterest::SAITAMA => '埼玉県',
        PrefectureOfInterest::CHIBA => '千葉県',
        PrefectureOfInterest::TOKYO => '東京都',
        PrefectureOfInterest::KANAGAWA => '神奈川県',
        PrefectureOfInterest::NIIGATA => '新潟県',
        PrefectureOfInterest::TOYAMA => '富山県',
        PrefectureOfInterest::ISHIKAWA => '石川県',
        PrefectureOfInterest::FUKUI => '福井県',
        PrefectureOfInterest::YAMANASHI => '山梨県',
        PrefectureOfInterest::NAGANO => '長野県',
        PrefectureOfInterest::GIFU => '岐阜県',
        PrefectureOfInterest::SHIZUOKA => '静岡県',
        PrefectureOfInterest::AICHI => '愛知県',
        PrefectureOfInterest::MIE => '三重県',
        PrefectureOfInterest::SHIGA => '滋賀県',
        PrefectureOfInterest::KYOTO => '京都府',
        PrefectureOfInterest::OSAKA => '大阪府',
        PrefectureOfInterest::HYOGO => '兵庫県',
        PrefectureOfInterest::NARA => '奈良県',
        PrefectureOfInterest::WAKAYAMA => '和歌山県',
        PrefectureOfInterest::TOTTORI => '鳥取県',
        PrefectureOfInterest::SHIMANE => '島根県',
        PrefectureOfInterest::OKAYAMA => '岡山県',
        PrefectureOfInterest::HIROSHIMA => '広島県',
        PrefectureOfInterest::YAMAGUCHI => '山口県',
        PrefectureOfInterest::TOKUSHIMA => '徳島県',
        PrefectureOfInterest::KAGAWA => '香川県',
        PrefectureOfInterest::EHIME => '愛媛県',
        PrefectureOfInterest::KOCHI => '高知県',
        PrefectureOfInterest::FUKUOKA => '福岡県',
        PrefectureOfInterest::SAGA => '佐賀県',
        PrefectureOfInterest::NAGASAKI => '長崎県',
        PrefectureOfInterest::KUMAMOTO => '熊本県',
        PrefectureOfInterest::OITA => '大分県',
        PrefectureOfInterest::MIYAZAKI => '宮崎県',
        PrefectureOfInterest::KAGOSHIMA => '鹿児島県',
        PrefectureOfInterest::OKINAWA => '沖縄県',
    ],

return [
    ::class => [
        MyArea::None => '未設定',
        MyArea::HOKKAIDO => '北海道',
        MyArea::AOMORI => '青森県',
        MyArea::IWATE => '岩手県',
        MyArea::MIYAGI => '宮城県',
        MyArea::AKITA => '秋田県',
        MyArea::YAMAGATA => '山形県',
        MyArea::FUKUSHIMA => '福島県',
        MyArea::IBARAKI => '茨城県',
        MyArea::TOCHIGI => '栃木県',
        MyArea::GUNMA => '群馬県',
        MyArea::SAITAMA => '埼玉県',
        MyArea::CHIBA => '千葉県',
        MyArea::TOKYO => '東京都',
        MyArea::KANAGAWA => '神奈川県',
        MyArea::NIIGATA => '新潟県',
        MyArea::TOYAMA => '富山県',
        MyArea::ISHIKAWA => '石川県',
        MyArea::FUKUI => '福井県',
        MyArea::YAMANASHI => '山梨県',
        MyArea::NAGANO => '長野県',
        MyArea::GIFU => '岐阜県',
        MyArea::SHIZUOKA => '静岡県',
        MyArea::AICHI => '愛知県',
        MyArea::MIE => '三重県',
        MyArea::SHIGA => '滋賀県',
        MyArea::KYOTO => '京都府',
        MyArea::OSAKA => '大阪府',
        MyArea::HYOGO => '兵庫県',
        MyArea::NARA => '奈良県',
        MyArea::WAKAYAMA => '和歌山県',
        MyArea::TOTTORI => '鳥取県',
        MyArea::SHIMANE => '島根県',
        MyArea::OKAYAMA => '岡山県',
        MyArea::HIROSHIMA => '広島県',
        MyArea::YAMAGUCHI => '山口県',
        MyArea::TOKUSHIMA => '徳島県',
        MyArea::KAGAWA => '香川県',
        MyArea::EHIME => '愛媛県',
        MyArea::KOCHI => '高知県',
        MyArea::FUKUOKA => '福岡県',
        MyArea::SAGA => '佐賀県',
        MyArea::NAGASAKI => '長崎県',
        MyArea::KUMAMOTO => '熊本県',
        MyArea::OITA => '大分県',
        MyArea::MIYAZAKI => '宮崎県',
        MyArea::KAGOSHIMA => '鹿児島県',
        MyArea::OKINAWA => '沖縄県',
    ],
];
?>