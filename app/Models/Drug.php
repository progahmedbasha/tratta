<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class,'sub_cat_id');
    }
    public function variables()
    {
        return $this->morphMany(Variable::class, 'variableable');
    }
    public function variableDetails()
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
    public function scopeWhenSearch($query,$search){
          return $query->when($search,function($q)use($search){
              return $q->where('name','like',"%$search%")
                  ->orWhere('code','like',"%$search%");
          });
       }
}