<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Prefecture;
use App\Enums\Gender;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    protected $fillable = [
        'familyName',
        'firstName',
        'name',
        'gender',
        'prefectureOfInterest',
        'cityOfInterest',
        'searchSettingByEmail',
        'introduction',
        'birthdate_1i',
        'birthdate_2i',
        'birthdate_3i',
        'user_id',
        'user_image'  
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prefecture()
    {
        return $this->belongsTo('App\Models\Prefecture', 'prefectureOfInterest');
    }

    public static function getGenderDescription($value) {
        return Gender::getDescription($value);
    }

    public function getUsersImagePath($users) {
        
        foreach($users as $userRecord) {
            $userRecord->image_path = $userRecord->profile->getImagePathAttributes();
        }
        return $users;
    }

    public function getImagePathAttributes() {
        return Storage::disk('s3')->url('UserImages/' . $this->user_image);
    }
    

    const SEARCHSETTINGBYEMAIL = [
        1 => '許可する',
        2 => '許可しない',
    ];

    const GENDER = [
        1 => '男性',
        2 => '女性',
    ];

    const BIRTHDATE_1I = [
        1930 => 1930,
        1931 => 1931,
        1932 => 1932,
        1933 => 1933,
        1934 => 1934,
        1935 => 1935,
        1936 => 1936,
        1937 => 1937,
        1938 => 1938,
        1939 => 1939,
        1940 => 1940,
        1941 => 1941,
        1942 => 1942,
        1943 => 1943,
        1944 => 1944,
        1945 => 1945,
        1946 => 1946,
        1947 => 1947,
        1948 => 1948,
        1949 => 1949,
        1950 => 1950,
        1951 => 1951,
        1952 => 1952,
        1953 => 1953,
        1954 => 1954,
        1955 => 1955,
        1956 => 1956,
        1957 => 1957,
        1958 => 1958,
        1959 => 1959,
        1960 => 1960,
        1961 => 1961,
        1962 => 1962,
        1963 => 1963,
        1964 => 1964,
        1965 => 1965,
        1966 => 1966,
        1967 => 1967,
        1968 => 1968,
        1969 => 1969,
        1970 => 1970,
        1971 => 1971,
        1972 => 1972,
        1973 => 1973,
        1974 => 1974,
        1975 => 1975,
        1976 => 1976,
        1977 => 1977,
        1978 => 1978,
        1979 => 1979,
        1980 => 1980,
        1981 => 1981,
        1982 => 1982,
        1983 => 1983,
        1984 => 1984,
        1985 => 1985,
        1986 => 1986,
        1987 => 1987,
        1988 => 1988,
        1989 => 1989,
        1990 => 1990,
        1991 => 1991,
        1992 => 1992,
        1993 => 1993,
        1994 => 1994,
        1995 => 1995,
        1996 => 1996,
        1997 => 1997,
        1998 => 1998,
        1999 => 1999,
        2000 => 2000,
        2001 => 2001,
        2002 => 2002,
        2003 => 2003,
        2004 => 2004,
        2005 => 2005,
        2006 => 2006,
        2007 => 2007,
        2008 => 2008,
        2009 => 2009,
        2010 => 2010,
        2011 => 2011,
        2012 => 2012,
        2013 => 2013,
        2014 => 2014,
        2015 => 2015,
        2016 => 2016,
        2017 => 2017,
        2018 => 2018,
        2019 => 2019,
        2020 => 2020,
    ];

    const BIRTHDATE_2I = [
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        11 => 11,
        12 => 12,
    ];

    const BIRTHDATE_3I = [
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        11 => 11,
        12 => 12,
        13 => 13,
        14 => 14,
        15 => 15,
        16 => 16,
        17 => 17,
        18 => 18,
        19 => 19,
        20 => 20,
        21 => 21,
        22 => 22,
        23 => 23,
        24 => 24,
        25 => 25,
        26 => 26,
        27 => 27,
        28 => 28,
        29 => 29,
        30 => 30,
        31 => 31,
    ];
}

?>