<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredoseFourthQuestion extends Model
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
        public function fourthQuestionScore()
    {
        return $this->hasMany(FourthQuestionScore::class,'fourth_question_id');
    }
}