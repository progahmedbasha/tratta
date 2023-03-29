<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
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
}