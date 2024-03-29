<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredoseSecondQuestion extends Model
{
    use HasFactory;
    public function variablePredoseQuestionRange()
    {
        return $this->morphMany(PredoseQuestionRange::class, 'variableable');
    }
     public function predoseQuestionRange()
    {
        return $this->hasMany(PredoseQuestionRange::class,'variableable_id');
    }
}