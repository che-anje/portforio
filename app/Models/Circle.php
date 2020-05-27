<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Prefecture;
use App\Models\Genre;
use App\Models\Profile;

class Circle extends Model
{
    protected $fillable = [
        'name',
        'introduction',
        'prefecture_id',
        'detailedArea',
        'ageGroup',
        'activityDay',
        'cost',
        'image',
        'recruit_status',
        'description_template',
        'request_required',
        'private_status',
        'admin_user_id',        
    ];

    public function prefecture() {
        return $this->belongsTo(Prefecture::class);
    }

    public function genre() {
        return $this->belongsToMany('App\Models\Genre', 'circle_genre', 'circle_id', 'genre_id');
        //->withPivot('id');
    }

    public function users() {
        return $this->belongsToMany('App\Models\User', 'circle_user', 'circle_id', 'user_id');
        //->withPivot('id');
    }

    public function categories() {
        return $this->belongsToMany('App\Models\Circle', 'category_circle', 'circle_id', 'category_id');
        //->withPivot('id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'admin_user_id');
    }

    const AGEGROUP = [
        0 => '指定しない',
        1 => '10代',
        2 => '20代',
        3 => '30代',
        4 => '40代',
        5 => '50代以上'
    ];

}
