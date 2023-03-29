<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrugIndication extends Model
{
    use HasFactory;
    public $guarded = [];
    public function indication()
    {
        return $this->belongsTo(Indication::class);
    }
    public function variables()
    {
        return $this->morphMany(Variable::class, 'variableable');
    }
    public function variablePredose()
    {
        return $this->morphMany(PredoseVariable::class, 'variableable');
    }
}