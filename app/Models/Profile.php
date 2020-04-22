<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Enums\Gender;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getGenderDescription($value) {
        return Gender::getDescription($value);
    }
}

?>