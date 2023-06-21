<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predose extends Model
{
    use HasFactory;

    public function predoseVariable()
    {
        return $this->hasMany(PredoseVariable::class);
    }


    public function firstQuestions() {
        return $this->hasMany(PredoseFirstQuestion::class);
    }

    public function secondQuestions() {
        return $this->hasMany(PredoseSecondQuestion::class);
    }

    public function thirdQuestions() {
        return $this->hasMany(PredoseThirdQuestion::class);
    }

    public function fourthQuestion() {
        return $this->hasOne(PredoseFourthQuestion::class);
    }

}