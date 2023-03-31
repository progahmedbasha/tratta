<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FourthQuestionScore extends Model
{
    use HasFactory;
    public function scorePoint()
    {
        return $this->hasOne(ScorePoint::class);
    }
        public function child()
    {
        return $this->hasMany(FourthQuestionScore::class,'parent_id');
    }
}