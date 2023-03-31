<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IllnessSub extends Model
{
    use HasFactory;
    public $guarded = [];
    public function illnessCategory()
    {
        return $this->belongsTo(IllnessCategory::class);
    }
    public function variables()
    {
        return $this->morphMany(VariableDetail::class, 'optionable');
    }
    public function variableDoses()
    {
        return $this->morphMany(NoteDoseVariable::class, 'variableable');
    }
    public function variableForbidden()
    {
        return $this->morphMany(ForbiddenCaseValue::class, 'variableable');
    }
    public function variablePredose()
    {
        return $this->morphMany(PredoseVariable::class, 'variableable');
    }
    public function variablePredoseThirdQuestion()
    {
        return $this->morphMany(PredoseThirdQuestion::class, 'variableable');
    }
    public function variableScorePoint()
    {
        return $this->morphMany(ScorePoint::class, 'variableable');
    }
}