<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Point_Log;
use App\Models\Circle_Ranking;

class Circle_Ranking extends Model
{
    protected $table = 'circle_ranking';
    protected $fillable = [
        'circle_id', 'total_point', 'rank'
    ];

    public function circle()
    {
        return $this->belongsTo(Circle::class);
    }
}
